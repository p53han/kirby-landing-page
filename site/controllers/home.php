<?php
// @author Alexander Schalk
// site/controllers/home.php
use Kirby\Cms\App as Kirby;
use Kirby\Exception\Exception;
use Kirby\Toolkit\V;

return function (Kirby $kirby, $page) {

    $formSuccess = false;
    $formErrors = [];
    $formData = [];

    
    if ($kirby->request()->is('POST')) {

        // Honeypotprüfung
        if (empty(get('website')) === false) {
            // Bot erkannt, tue nichts oder logge es
            go($page->url()); // Einfach zur Seite zurückleiten
            exit;
        }

        // CSRF Token 
        if (csrf(get('csrf')) === false) {
            
            $formErrors['csrf'] = 'Ungültige Anfrage. Bitte laden Sie die Seite neu.';
            
        } else {
            
            $data = [
                'first_name' => trim(get('first_name')),
                'last_name'  => trim(get('last_name')),
                'email'      => trim(get('email')),
                'message'    => trim(get('message'))
            ];

            // Backend-Validierung
            $rules = [
                'first_name' => ['required'],
                'last_name'  => ['required'],
                'email'      => ['required', 'email'],
                'message'    => ['required', 'minLength' => 10]
            ];

            $messages = [
                'first_name' => 'Bitte geben Sie Ihren Vornamen ein.',
                'last_name'  => 'Bitte geben Sie Ihren Nachnamen ein.',
                'email'      => 'Bitte geben Sie eine gültige E-Mail-Adresse ein.',
                'message'    => 'Ihre Nachricht muss mindestens 10 Zeichen lang sein.'
            ];

            
            if ($invalid = invalid($data, $rules, $messages)) {
                
                $formErrors = $invalid;
                $formData = $data;
            } else {
                try {
                    $emailBody  = "Neue Kontaktanfrage:\n\n";
                    $emailBody .= "Vorname: " . $data['first_name'] . "\n";
                    $emailBody .= "Nachname: " . $data['last_name'] . "\n";
                    $emailBody .= "E-Mail: " . $data['email'] . "\n\n";
                    $emailBody .= "Nachricht:\n" . $data['message'];

                    
                    $kirby->email([
                        'to'      => 'pokelex@mail.de',
                        'from'    => 'noreply@pokelex.de,',
                        'replyTo' => $data['email'],           
                        'subject' => 'Kontaktformular: Neue Anfrage von ' . $data['first_name'] . ' ' . $data['last_name'],
                        'body'    => $emailBody
                    ]);

                    
                    $formSuccess = true;
                    $formData = []; 

                } catch (Exception $e) {
                    
                    error_log('Kontaktformular Fehler: ' . $e->getMessage());
                    
                    $formErrors['mail'] = 'Entschuldigung, Ihre Nachricht konnte nicht gesendet werden. Bitte versuchen Sie es später erneut.';
                    $formData = $data; 
                }
            }
        }
    }

    
    return [
        'formErrors'  => $formErrors,
        'formSuccess' => $formSuccess,
        'formData'    => $formData
    ];
};