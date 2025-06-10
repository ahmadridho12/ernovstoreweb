<?php

namespace App\Helpers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;

class SeoHelper
{
    public static function set(string $title, string $description, array $images = [], string $url = null)
    {
        SEOMeta::setTitle($title);
        OpenGraph::setTitle($title);
        JsonLd::setTitle($title);

        SEOMeta::setDescription($description);
        OpenGraph::setDescription($description);
        JsonLd::setDescription($description);

        if ($url) {
            SEOMeta::setCanonical($url);
            OpenGraph::setUrl($url);
            JsonLd::setUrl($url);
        }

        if (!empty($images)) {
            OpenGraph::addImages($images);
            JsonLd::addImage($images);
        }
    }

    public static function homepage(?string $image = null)
    {
        self::set(
            'Ernov - Genuine Exotic Leather Fashion from Bali',
            'Explore our collection of premium leather bags, wallets, and fashion products made from genuine exotic leather with distinctive Balinese design.',
            $image ? [$image] : [],
            url('/')
        );
    }

    public static function product(string $title, string $description, ?string $image = null, ?string $url = null)
    {
        self::set(
            "$title - Ernov",
            $description,
            $image ? [$image] : [],
            $url ?? url()->current()
        );
    }

    public static function productDetail(string $name, string $description, ?string $image = null, ?string $url = null)
    {
        self::set(
            "$name - Ernov",
            strip_tags($description),
            $image ? [$image] : [],
            $url ?? url()->current()
        );
    }

    public static function category(string $categoryName, ?string $image = null)
    {
        self::set(
            "$categoryName - Ernov Product Collection",
            "Discover a variety of leather fashion products in the $categoryName category at Ernov.",
            $image ? [$image] : [],
            url()->current()
        );
    }

    public static function about()
    {
        self::set(
            'About Us - Ernov',
            'Ernov is a local fashion brand from Bali offering high-quality leather products with a signature Balinese touch.',
            [],
            url('/about')
        );
    }

    public static function contact()
    {
        self::set(
            'Contact Us - Ernov',
            'Get in touch with us for more information about Ernov products, orders, or business collaboration.',
            [],
            url('/contact')
        );
    }

    public static function order()
    {
        self::set(
            'Order Now - Ernov',
            'Easily place an order for Ernov’s genuine leather products. Choose your favorite and complete your purchase today.',
            [],
            url('/order')
        );
    }

    public static function shipping()
    {
        self::set(
            'Shipping Information - Ernov',
            'Learn about our shipping policy and process for Ernov products across Indonesia and internationally. Fast and secure delivery.',
            [],
            url('/shipping')
        );
    }

    public static function faq()
    {
        self::set(
            'Frequently Asked Questions (FAQ) - Ernov',
            'Find answers to common questions about Ernov’s products, ordering, payment, and delivery process.',
            [],
            url('/faq')
        );
    }
}
