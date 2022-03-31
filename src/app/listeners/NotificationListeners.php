<?php

namespace App\Listeners;

use Phalcon\Di\Injectable;
use Phalcon\Events\Event;

class NotificationListeners extends Injectable
{

    public function afterSend(Event $event, $as)
    {
        //     $logger = $this->di->get('logger');
        //     $logger->info('After notification');
        die('logger');
    }
    public function afterAdd(Event $event, $product, $setting)
    {
        // echo $product->price;



        if ($product->price == '') {
            // echo "56";
            // die();
            $logger = $this->di->get('logger');
            $logger->info('default price set');
            $product->price =$setting->Default_Price;
        }
        if ($product->stock == '') {
            $logger = $this->di->get('logger');
            $logger->info('default stock set');
            $product->stock = $setting->default_stock;
            // echo "4564";
            // die();
        }
        if ($setting->title_optimization == 'N') {
        }

        if ($setting->title_optimization == 'Y') {

            $product->name = $product->name + $product->tag;
        }

        return $product;
    }
    public function afterorderAdd(Event $event, $order, $setting)
    {
        // echo $product->price;



        if ($order->Zipcode == '') {
            // echo "56";
            // die();
            $logger = $this->di->get('logger');
            $logger->info('default price set');
            $order->Zipcode =$setting->default_zip;
        }
        // if ($product->stock == '') {
        //     $logger = $this->di->get('logger');
        //     $logger->info('default stock set');
        //     $product->stock = $setting->default_stock;
        //     // echo "4564";
        //     // die();
        // }
        // if ($setting->title_optimization == 'N') {
        // }

        // if ($setting->title_optimization == 'Y') {

        //     $product->name = $product->name + $product->tag;
        // }

        return $order;
    }
}
