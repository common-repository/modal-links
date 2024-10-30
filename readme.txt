=== Modal Links ===

Contributors: grglaz
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=43B53PFVBN9HA
Tags: modal, shortcode, modal window, modal link, link, jquery modal, jquery ui dialog
Requires at least: 3.0.1
Tested up to: 3.9
Stable tag: 1.8.4
License: PHP License 2.01
License URI: http://www.php.net/license/2_01.txt

This is NOT just another modal plugin. Its much more. With this plugin you add modal functionalities to your wordpress.

== Description ==

<strong>IN NOT ACTIVE DEVELOPMENT!!!</strong>

<strong>IN NOT ACTIVE DEVELOPMENT!!!</strong>

<strong>IN NOT ACTIVE DEVELOPMENT!!!</strong>
_________________________

<strong>Basic Features:</strong>

* Create modal link of post/page using shortcode or plain html link.
* Use of posts/pages as modals. No need to create new content somewhere else.
* Use id or permalink to target the post/page. Id is recommended.
* Use of special category "Modals" for different mechanism behaviour.
* Hide or Show post's/page's title in modal window using the shortcode attribute "title".
* Open wp's Login/Logout and Register form (in beta).
* Many options to adjust the modal to your own needs.
* Option to use Login/Register links of Meta Widget as "Modal Links".
* Option to use Read More Links as "Modal Links".
* It is multisite ready.
* Translation ready.
* Check the <a href="https://wordpress.org/plugins/modal-links/faq/">FAQ</a>.
_________________________

<strong>Options:</strong>

* Width               : Choose the width of dialog. Leave empty or '0' for auto.
* Min Width           : Choose the min width of dialog. Leave empty or '0' for auto.
* Max Width           : Choose the max width of dialog. Leave empty or '0' for auto.
* Width Type          : Choose between fixed and fluid type. (fixed/fluid)
* Responsive Width    : Choose true if you want the width to be re-calculated on window resize. Will work only for fluid width type. (true/false)
* Height              : Choose the height of dialog. After that value dialog goes scrollable.
* Max Height          : Choose the max height of dialog. After that value dialog goes scrollable.
* Min Height          : Choose the min height of dialog. Leave empty or '0' for auto.
* Max Height          : Choose the max height of dialog. Leave empty or '0' for auto.
* Height Type         : Choose between fixed and responsive type. (fixed/fluid)
* Responsive Height   : Choose true if you want the height to be re-calculated on window resize. Will work only for fluid height type. (true/false)
* Draggable           : Choose if the dialog will be draggable. (true/false)
* Resizable           : Choose if the dialog will be resizable. (true/false)
* Show Title          : Choose to show or hide the title, global option overrides title attribute in shortcodes or the data-title attribute in "modal" links. (true/false)
* Show Date           : Choose to show the date of the post/page. (true/false)
* Show Author         : Choose to show the author of the post/page. (true/false)
* Animate on Show     : Choose if the dialog will animate on opening. (true/false)
* Animate on Hide     : Choose if the dialog will animate on hiding. (true/false)
* Is Modal            : Choose if the dialog will behave as modal or no. (true/false)
* Close Icon          : Choose false to hide close (X) icon. (true/false)
* Close on Escape     : Choose if the dialog will close using esc key. (true/false)
* Loading Image       : Switch off or select the pre-loading image. (off/images)
* CSS Class           : Enter any additional class that you want to attach to the dialog.
* Position            : Choose the position of the dialog. (left, center, right, top, bottom)
* Responsive Position : Choose true if you want to re-position the dialog on window resize. (true/false)
_________________________

<strong>Shortcode Attributes:</strong>

* <strong>id</strong>     : The post's/page's id.
* <strong>permalink</strong> : The post's/page's permalink.
* <strong>title</strong>  : To force the post's/page's title hide or show in modal window.
* <strong>login</strong>  : Use login="true" to show wp's login/logout or register form.
* <strong>action</strong> : Use action="register" to show wp's register form.

Notes: <br />
* id or permalink are required to open a post/page. <br />
* login="true" is required to open login/logout or register form. <br />
* action="register" is required to open registration form. <br />
* title is optional in any case. <br />
* if both id and permalink provided, id will be used.
_________________________

<strong>HTML Link Attributes:</strong>

* <strong>id</strong>          : The post's/page's id.
* <strong>href</strong>        : The post's/page's permalink otherwise "#".
* <strong>data-title</strong>  : To force the post's/page's title hide or show in modal window.
* <strong>data-login</strong>  : Use data-login="true" to show wp's login/logout or register form.
* <strong>data-action</strong> : Use data-action="register" to show wp's register form.

Notes: <br />
* always provide target="_modal". <br />
* href should be set to '#' or set the post's/page's permalink. <br />
* data-login="true" is required to open login/logout or register form. <br />
* data-action="register" is required to open registration form. <br />
* data-title is optional in any case. <br />
* if both id and href="PERMALINK" provided, id will be used.
_________________________

<strong>Learn by example:</strong>

Playing with the link name <br />

* Normal usage of link name. <br />
<strong>Shortcode:</strong> <code>[modalLinks id=“1”]link[/modalLinks]</code> <br />
<strong>HTML:</strong> <code><a target="_modal" href=“#” id=“1”>link</a></code>

* If you leave empty the link name in the shortcode dont worry, id/permalink or login/register form name will get in place. <br />
<strong>Shortcode:</strong> <code>[modalLinks id=“1”][/modalLinks]</code> <br />
<strong>Result:</strong> <code><a target="_modal" href=“#” id=“1”>1</a></code>

* You can use unclosed shortcode, again we take care the link name. <br />
<strong>Shortcode:</strong> <code>[modalLinks id=“1” /]</code> <br />
<strong>Result:</strong> <code><a target="_modal" href=“#” id=“1”>1</a></code>

Referring to the post/page by id or permalink <br />

* Open post/page with id ‘1’. <br />
<strong>Shortcode:</strong> <code>[modalLinks id=“1”]...</code> <br />
<strong>HTML:</strong> <code><a target="_modal" href=“#” id=“1”>...</code>

* Open post/page with permalink ‘?p=1’. <br />
<strong>Shortcode:</strong> <code>[modalLinks permalink=“?p=1”]...</code> <br />
<strong>HTML:</strong> <code><a target="_modal" href=“?p=1”>...</code>

* If you provide both id and permalink in the shortcode, id will be used. <br />
<strong>Shortcode:</strong> <code>[modalLinks id=“1” permalink=“?p=2”]...</code> <br />
<strong>RESULT:</strong> <code><a target="_modal" href=“#” id=“1”>...</code>

Showing or hiding the title of post/page <br />

* Title is NOT showing for post/page with id ‘1’. <br />
<strong>Shortcode:</strong> <code>[modalLinks id=“1” title=“false”]...</code> <br />
<strong>HTML:</strong> <code><a target="_modal" href=“#” id=“1” data-title=“false”>...</code>

* Title is showing for post with id ‘2’ which is in ‘Modal’ category. <br />
<strong>Shortcode:</strong> <code>[modalLinks id=“2” title=“true”]...</code> <br />
<strong>HTML:</strong> <code><a target="_modal" href=“#” id=“2” data-title=“true”>...</code>

Open wordpress’s Login/Logout or Register form. <br />

* Opens login or logout according of user’s state. <br />
<strong>Shortcode:</strong> <code>[modalLinks login=“true”]...</code> <br />
<strong>HTML:</strong> <code><a target="_modal" href=“#” data-login=“login”>...</code>

* Opens registration form no matter of user’s state. <br />
<strong>Shortcode:</strong> <code>[modalLinks login=“true” action=“register”]...</code> <br />
<strong>HTML:</strong> <code><a target="_modal" href=“#” data-login=“login” data-action=“register”>...</code>

== Installation ==

1. Upload the folder "modal-links" to the "/wp-content/plugins/" directory or install it through WordPress directly.
2. Activate the "Modal Links" plugin through the 'Plugins' menu in WordPress.
3. Go to Settings->Modal Links and check the options.

== Frequently Asked Questions ==

= How do i create a modal link? =

Use the shortcode <br /><strong>[modalLinks]LINK_NAME[/modalLinks]</strong><br /> in a post or page.<br />

<strong>Shortcode Attributes:</strong>

* <strong>id</strong>        : The post's/page's id.
* <strong>permalink</strong> : The post's/page's permalink.
* <strong>title</strong>     : To force the post's/page's title hide or show in modal window.
* <strong>login</strong>     : Use it without id or permalink attributes to show wp's login/logout form.
* <strong>action</strong>    : Use action="register" with 'login' attribute provided to show wp's register form.

<strong>Notes:</strong> <br />
* id or permalink are required to open a post/page. <br />
* login is required to open login/logout form. <br />
* action="register" is required to open registration form. <br />
* title is optional in any case. <br />
* if both id and permalink provided, id will be used.

= What if i have shortcodes in my post or page? =

Shortcodes should render fine in the modal.
Alhough some seems that not responding.

= Does this plugin works for both posts and pages? =

Yes.

= Does this plugin works for any permalink setting? =

Yes, except of custom permalinks if you refer to a post/page by permalink.

= Which library do you use for the modal? =

Wordpress's built in jQuery Dialog.

== Screenshots ==

1. screenshot-1.png The menu in settings
2. screenshot-2.png The plugin's settings
3. screenshot-3.png The shorthand
4. screenshot-4.png The link
5. screenshot-5.png The modal in action

== Changelog ==

= 1.8.4 =
Bugs fixed.

= 1.8.3 =
Donatable extensions are closed for this period.

= 1.8.2 =
Bug fixed.

= 1.8.1 =
Bug fixed.

= 1.8.0 =
New Options added. Bugs fixed.

= 1.7.9 =
Bug fixed.

= 1.7.8 =
Bug fixed.

= 1.7.7 =
Bug fixed.

= 1.7.6 =
Bug fixed.

= 1.7.5 =
Tooltips in js file. Bug fixed.

= 1.7.4 =
Bug fixed.

= 1.7.3 =
New options added. Bugs fixed. Please after update disable and re-enable the plugin.

= 1.7.2 =
Bug fixed.

= 1.7.1 =
Bug fixed.

= 1.7.0 =
Shortcode Validation extension merged. Bug fixed.

= 1.6.0 =
Read More extension merged. Bug fixed.

= 1.5.3 =
Bug fixed.

= 1.5.2 =
Bug fixed.

= 1.5.1 =
New options added. Bug fixed.

= 1.5.0 =
New options added. Bug fixed.

= 1.3.8 =
Bug fixed.

= 1.3.7 =
New option added. Bug fixed.

= 1.3.6 =
Bug fixed.

= 1.3.5 =
Better shortcode rendering.

= 1.3.1 =
Bugs fixed.

= 1.3.0 =
New option added, Bugs fixed.

= 1.2.0 =
New option added, Bugs fixed.

= 1.1.0 =
Animation options added in the settings page.

= 1.0.0 =
First stable version

= 0.0.9 =
bugs fix, faster code...

= 0.0.8 =
login/logout and register form improved css...

= 0.0.7 =
bugs fix, lots of new things

= 0.0.6 =
modal window width can now be setup

= 0.0.5 =
many fixes

= 0.0.4 =
now you can hide post's or page's title

= 0.0.3 =
now you can use permalink instead id in shortcode

= 0.0.2 =
Bugs fix

= 0.0.1 =
First version

== Upgrade Notice ==

= 1.8.4 =
Bugs fixed.

= 1.8.3 =
Donatable extensions are closed for this period.

= 1.8.2 =
Bug fixed.

= 1.8.1 =
Bug fixed.

= 1.8.0 =
New Options added. Bugs fixed.

= 1.7.9 =
Bug fixed.

= 1.7.8 =
Bug fixed.

= 1.7.7 =
Bug fixed.

= 1.7.6 =
Bug fixed.

= 1.7.5 =
Tooltips in js file. Bug fixed.

= 1.7.4 =
Bug fixed.

= 1.7.3 =
New options added. Bugs fixed. Please after update disable and re-enable the plugin.

= 1.7.2 =
Bug fixed.

= 1.7.1 =
Bug fixed.

= 1.7.0 =
Shortcode Validation extension merged. Bug fixed.

= 1.6.0 =
Read More extension merged. Bug fixed.

= 1.5.3 =
Bug fixed.

= 1.5.2 =
Bug fixed.

= 1.5.1 =
New options added. Bug fixed. Please disable and re-enable the plugin after updating.

= 1.5.0 =
New options added. Bug fixed.

= 1.3.8 =
Bug fixed.

= 1.3.7 =
New option added. Bug fixed.

= 1.3.6 =
Bug fixed.

= 1.3.5 =
Better shortcode rendering.

= 1.3.1 =
Bugs fixed.

= 1.3.0 =
New option added, Bugs fixed.

= 1.2.0 =
New option added, Bugs fixed.

= 1.1.0 =
Animation options added in the settings page.

= 1.0.0 =
First stable version

= 0.0.9 =
bugs fix, faster code...

= 0.0.8 =
login/logout and register form improved css...

= 0.0.7 =
bugs fix, lots of new things

= 0.0.6 =
modal window width can now be setup

= 0.0.5 =
many fixes

= 0.0.4 =
now you can hide post's or page's title

= 0.0.3 =
now you can use permalink instead id in shortcode

= 0.0.2 =
Bugs fix

= 0.0.1 =
This is the first version