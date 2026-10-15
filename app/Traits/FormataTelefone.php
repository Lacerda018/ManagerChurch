<?php
namespace App\Traits;

    trait FormataTelefone
    {
        public function formatPhoneNumber($phoneNumber)
        {
            // Remove any non-digit characters from the phone number
            $digits = preg_replace('/\D/', '', $phoneNumber);

            // Format the phone number based on its length
            if (strlen($digits) === 10) {
                // Format as (XX) XXXX-XXXX
                return '(' . substr($digits, 0, 2) . ') ' . substr($digits, 2, 4) . '-' . substr($digits, 6);
            } elseif (strlen($digits) === 11) {
                // Format as (XX) XXXXX-XXXX
                return '(' . substr($digits, 0, 2) . ') ' . substr($digits, 2, 5) . '-' . substr($digits, 7);
            } else {
                // Return the original phone number if it doesn't match expected lengths
                return $phoneNumber;
            }
        }
    }