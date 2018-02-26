<?php declare(strict_types=1);

namespace App\Presenters;

use Contact\ContactForm;
use Contact\Events\EmailEvent;
use GeneralForm\EventException;


/**
 * Class ContactPresenter
 *
 * @author  geniv
 * @package App\Presenters
 */
class ContactPresenter extends ModulesBasePresenter
{

    /**
     * Render default.
     */
    public function renderDefault()
    {
        $this['breadCrumb']->addLink('breadcrumb-contact', [], 'fa fa-envelope-o');
    }


    /**
     * Create component contact form.
     *
     * @param ContactForm $contactForm
     * @param EmailEvent  $emailEvent
     * @return ContactForm
     */
    protected function createComponentContactForm(ContactForm $contactForm, EmailEvent $emailEvent): ContactForm
    {
//        $emailEvent->setTemplatePath(__DIR__ . '/templates/Contact/email.latte');
        $emailEvent->getMessage()
            ->addTo('example@gmail.com');

        $contactForm->onSuccess[] = function (array $values) {
            $this->flashMessage('odeslano', 'success');
        };
        $contactForm->onException[] = function (EventException $e) {
            $this->flashMessage($e->getMessage(), 'danger');
            $this->redirect('this');
        };
        return $contactForm;
    }
}
