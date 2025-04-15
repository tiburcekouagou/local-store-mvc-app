<?php
namespace App\Services;

class OrderService {
    public function __construct(protected Mailer $mailer) {}

    public function placeOrder($email) {
        $this->mailer->send($email, "Votre commande a été reçue !");
    }
}