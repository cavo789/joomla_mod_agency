# mod_agency
mod_agency is a module for the Joomla backend and will display informations about the web agency who's responsible for the site.  Name, URL, phone number, email, skype,  ... of the person in charge of the daily maintenance of the site.   mod_agency has been developped by the JUG Wallonie (http://www.jugwallonie.be)

mod_agency can be displayed in any Joomla admin position and will display something like this : 
<img src="https://github.com/cavo789/mod_agency/blob/master/assets/images/doc_sample.png" width="600" />

Each informations can be parametrized through the module edition screen, tab Advanced
<img src="https://github.com/cavo789/mod_agency/blob/master/assets/images/doc_module.png" width="600" />

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

When "InfoURL" is filled in, the module will try to retrieve that file (using cURL) and if successfull, will adapt the parameters of the module.  So, by only updating that file on their server, the web agency can "push" a new information like a new phone number or a new message like "Dear customer, please note that I'll be unavailable during the two first weeks of July...".

##How to install
Download a copy of this repository as a ZIP file on your disk and upload that archive to your website.
<img src="https://github.com/cavo789/mod_agency/blob/master/assets/images/doc_install_module.png" width="600" />

Once installed, go to Extensions -> Modules and please be sure to select "Administration" to display modules related to the backend.  The mod_agency module should appears.  
<img src="https://github.com/cavo789/mod_agency/blob/master/assets/images/doc_module_admin.png" width="600" />

Edit the module to be able to 
* select the position (f.i. cpanel)
* not display the title
* and, of course, specifiy yours own infos :
<img src="https://github.com/cavo789/mod_agency/blob/master/assets/images/doc_parameters.png" width="600" />

Please note that the config.json file will be created at the first display of the module.   The file will be created in the folder /administrator/modules/mod_agency and will be called config.json.   

**Be carefull : the file won't be updated so, if you change the parameters, you'll need to delete the file first.**

The file isn't deleted automatically. Indeed, the idea is to get a newer version of that file from your own server.

Feel free to join to this repository and proposed new features.

Christophe & Marc,
JUG Wallonie.
