<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\ApplyCredit;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Card;
use App\Models\ContactForm;
use App\Models\Feature;
use App\Models\Hero;
use App\Models\NewBrand;
use App\Models\Product;
use App\Models\Service;
use App\Models\Shop;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function changeLocale($locale)
    {

        session()->put('lang', $locale);

        return redirect()->back();

    }

    public function home()
    {

        $hero = Hero::where('is_active', true)->orderBy('id','desc')->first();
        $features = Feature::where('is_active', true)->orderBy('id','desc')->get();
        $services = Service::where('is_active', true)->orderBy('id','desc')->get();
        $brands = Brand::where('is_active', true)->orderBy('id','asc')->get();
        $newbrands = NewBrand::where('is_active', true)->orderBy('id','asc')->get();
        $testimonials = Testimonial::where('is_active', true)->orderBy('id','desc')->get();
        $blogs = Blog::where('is_active', true)->orderBy('id','desc')->limit(3)->get();

        return view('front.home', compact('hero', 'features', 'services','brands','testimonials','blogs','newbrands'));

    }

    public function service_single(Service $service)
    {
        return view('front.service_single', compact('service'));
    }

    public function blog_single(Blog $blog)
    {
        return view('front.blog_single', compact('blog'));
    }

    public function blogs()
    {
        $blogs = Blog::where('is_active', true)->orderBy('id', 'desc')->get();
        return view('front.blogs', compact('blogs'));
    }

    public function about()
    {
        $about = About::where('is_active', true)->orderBy('id','desc')->first();
        return view('front.about', compact('about'));
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function brands()
    {
        $brands = Brand::where('is_active', true)->orderBy('id','desc')->get();

        return view('front.brands', compact('brands'));
    }

    public function shops()
    {
        $shops = Shop::with('images')->where('is_active', true)->get();
        return view('front.shops', compact('shops'));
    }

    public function card_single(Card $card)
    {
        return view('front.card_single' , compact('card'));
    }

    public function contact_form(Request $request)
    {

        $contact_form = new ContactForm();
        $contact_form->name = $request->name;
        $contact_form->phone = $request->phone_number;
        $contact_form->email = $request->email;
        $contact_form->message = $request->message;
        $contact_form->save();
        return redirect()->back()->with('message', 'Mesajınız uğurla göndərildi');

    }

    public function contact_list()
    {
        $contact_forms = ContactForm::orderBy('id','desc')->paginate(10);
        return view('contact_form.index', compact('contact_forms'));
    }

    public function apply_credit_list()
    {
        $apply_credits = ApplyCredit::orderBy('id','desc')->paginate(10);
        return view('apply_credit.index', compact('apply_credits'));
    }

    public function credit_form()
    {
        return view('front.credit_form');
    }

    public function apply_credit(Request $request)
    {

        ApplyCredit::create($request->all());
        return redirect()->back()->with('message','Müraciətiniz uğurla göndərildi');

    }

    public function products($id)
    {
        $products = Product::orderBy('id','desc')->where('brand_id', $id)->get();
        return view('front.products', compact('products'));
    }
}
