Contact module
==============

Installation
------------
manual install direct to modules directory
```bash
git clone https://github.com/geniv/nette-module-contact.git app/modules/ContactModule
```

Include in application
----------------------
neon configure (contact module does not model but only component):
```neon
# contact form
contactForm:
#	autowired: false
#	formContainer: Contact\FormContainer
	events:
		- Contact\Events\EmailEvent
		- AjaxFlashMessageEvent
		- ClearFormEvent
```

neon configure extension:
```neon
extensions:
    contactForm: Contact\Bridges\Nette\Extension
```

header menu:
```latte
<li n:class="$presenter->isLinkCurrent(':Contact:*') ? active"><a n:href=":Contact:">{_'header-contact'}</a></li>
```
