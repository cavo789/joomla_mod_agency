# mod_agency
mod_agency is a module for the Joomla backend and will display informations about the web agency who's responsible for the site.  Name, URL, phone number, email, skype,  ... of the person in charge of the daily maintenance of the site.   mod_agency has been developped by the JUG Wallonie (http://www.jugwallonie.be)

mod_agency can be displayed in any Joomla admin position and will display something like this : 
<img src="https://github.com/cavo789/mod_agency/blob/master/assets/images/sample.png" width="600" />

Each informations can be parametrized through the module edition screen, tab Advanced
<img src="https://github.com/cavo789/mod_agency/blob/master/assets/images/module.png" width="600" />

The idea is also to be able, for the web agency, to "push" informations on the website so there is a field "InfoURL" where the agency will provide a link to a .json file stored on their website.  

The structure of the .json is the following : 

```json
{
   "logo":"https://www.woluweb.be/woluweb.png",
   "title":"Woluweb",
   "url":"www.woluweb.be",
   "name":"Woluweb",
   "person":"Marc Dechèvre",
   "email":"xxxx@xxxxxxx",
   "country":"Belgium",
   "skype":"xxxxxx",
   "phone":"+32 999 99 99 99",
   "message":"<h3>Woluweb au service de la communauté &gt; Des pr&eacute;sentations libres d'acc&egrave;s</h3>",
   "color":"#0071bc;"
}
```

When "InfoURL" is filled in, the module will try to retrieve that file (using cURL) and if successfull, will adapt the parameters of the module.  So, by only updating that file on their server, the web agency can "push" a new information like a new phone number or a new message like "Dear customer, please note that I'll be unavaible during the two first weeks of July...".

Feel free to join to this repository and proposed new features.

Christophe & Marc,
JUG Wallonie.
