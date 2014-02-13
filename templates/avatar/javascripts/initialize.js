/** ------------------------------------------------------------------

 * JavaScripts which are loaded by the OnLoad function of the body tag

 * -------------------------------------------------------------------

 */



// executes JavaScripts for the loginbox and the menu

function InitializePage() {

  LoadLoginBox();

  LoadMenu();

}



// remove the deactivation container from the website

function ActivateWebsiteFrame() {

  g_Deactivated = false;

  document.getElementById('DeactivationContainer').style.display = "none";

  document.getElementById('DeactivationContainerThemebox').style.display = "none";

}



// functions for mouse-over and click events of non-content-buttons

function MouseOverBigButton(source)

{

  source.firstChild.style.visibility = "visible";

}

function MouseOutBigButton(source)

{

  source.firstChild.style.visibility = "hidden";

}



// function for Forum-Management

function CheckAll(form_name, checkbox_name) {

  var form = document.getElementById(form_name);

  if (form.ALL) {

    var c = form.ALL.checked;

  }

  for (var i=0; i<form.elements.length; i++) {

    var e = form.elements[i];

    if (e.name != checkbox_name) continue;

    e.checked = c;

  }

}



/** ---------------------

 * Loginbox functionality

 * ----------------------

 */



// initialisation of the loginbox status by the value of the variable 'loginStatus' which is provided to the HTML-document by PHP in the file 'header.inc'

function LoadLoginBox()

{

  if(loginStatus == "false") {

    document.getElementById('LoginstatusText_1').style.backgroundImage = "url('" + IMAGES + "/global/loginbox/loginbox-font-you-are-not-logged-in.gif')";

    document.getElementById('ButtonText').style.backgroundImage = "url('" + IMAGES + "/global/buttons/_sbutton_login.gif')";

    document.getElementById('LoginstatusText_2').style.backgroundImage = "url('" + IMAGES + "/global/loginbox/loginbox-font-create-account.gif')";

    document.getElementById('LoginstatusText_2_1').style.backgroundImage = "url('" + IMAGES + "/global/loginbox/loginbox-font-create-account.gif')";

    document.getElementById('LoginstatusText_2_2').style.backgroundImage = "url('" + IMAGES + "/global/loginbox/loginbox-font-create-account-over.gif')";

  } else {

    document.getElementById('LoginstatusText_1').style.backgroundImage = "url('" + IMAGES + "/global/loginbox/loginbox-font-welcome.gif')";

    document.getElementById('ButtonText').style.backgroundImage = "url('" + IMAGES + "/global/buttons/_sbutton_myaccount.gif')";

    document.getElementById('LoginstatusText_2').style.backgroundImage = "url('" + IMAGES + "/global/loginbox/loginbox-font-logout.gif')";

    document.getElementById('LoginstatusText_2_1').style.backgroundImage = "url('" + IMAGES + "/global/loginbox/loginbox-font-logout.gif')";

    document.getElementById('LoginstatusText_2_2').style.backgroundImage = "url('" + IMAGES + "/global/loginbox/loginbox-font-logout-over.gif')";

  }

}



// mouse-over and click events of the loginbox

function MouseOverLoginBoxText(source)

{

  source.lastChild.style.visibility = "visible";

  source.firstChild.style.visibility = "hidden";

}

function MouseOutLoginBoxText(source)

{

  source.firstChild.style.visibility = "visible";

  source.lastChild.style.visibility = "hidden";

}

function LoginButtonAction()

{

  if(loginStatus == "false") {

    window.location = LINK_ACCOUNT + "/account";

  } else {

    window.location = LINK_ACCOUNT + "/account";

  }

}

function LoginstatusTextAction(source) {

  if(loginStatus == "false") {

    window.location = LINK_ACCOUNT + "account/create";

  } else {

    window.location = LINK_ACCOUNT + "account/logout";

  }

}



/** ------------------

 *  Menu functionality

 *  ------------------

 */



/*

 * useful code for debugging:

 * var temp;

 * for(menuItemName in menu[0]) {

 *   temp += menu[0][menuItemName];

 *   temp += "   ";

 *  alert(menu[0][menuItemName] + "   " + menuItemName);

 * }

 */



/**

 * LOAD and SAVE the menu status by using arrays and the variable "self.name" which is a consistent JavaScript variable and

 * allows to pass its values from the source page to the destination page

 *

 * "self.name" has the following format in this document:

 * [menuname]=[value]&[menuname]=[value]& [...] &

 * news=1&abouttibia=0&gameguides=0&library=0&community=0&forum=0&account=0&support=0&

 *

 * the variable 'unloadhelper' is used because IE needs the event OnBeforeUnload() and all other browsers OnUnload()

 */



var menu = new Array();

menu[0] = new Object();

var unloadhelper = false;



// load the menu and set the active submenu item by using the variable 'activeSubmenuItem' (provided to HTML-document by PHP in the file 'header.inc'

function LoadMenu()

{

  document.getElementById("submenu_"+activeSubmenuItem).style.color = "white";

  document.getElementById("ActiveSubmenuItemIcon_"+activeSubmenuItem).style.visibility = "visible";

  if(self.name.lastIndexOf("&") == -1) {

    self.name = "news=1&abouttibia=0&gameguides=0&library=0&community=0&forum=0&account=0&support=0&shops=0&";

  }

  FillMenuArray();

  InitializeMenu();

}



function SaveMenu()

{

  if(unloadhelper == false) {

    SaveMenuArray();

    unloadhelper = true;

  }

}



// parse the values of the variable 'self.name' and store it in the array menu

// ATTENTION:

// if the user navigates from our website to another website which modifies self.name and returns to our page via the browsers back button

// our website receives the modified self.name value

function FillMenuArray()

{

  var MenuCount = 0;

  var mark1 = 0;

  var mark2 = 0;

  while(self.name.length > 0 ){

    MenuCount++;

    mark1 = self.name.indexOf("=");

    mark2 = self.name.indexOf("&");

    // abort parsing of self.name when:

    //   - a maximum 15 main menu points are parsed (our website uses currently (16.06.2010) 10 main menu points) 

    //   - no more "=" or "&" characters are found in the string

    //   - the string was parsed completely

    if (MenuCount > 15 || mark1 < 0 || mark2 < 0) break;

    var menuItemName = self.name.substr(0, mark1);

    menu[0][menuItemName] = self.name.substring(mark1 + 1, mark2);

    self.name = self.name.substr(mark2 + 1, self.name.length);

  }

}



// hide or show the corresponding submenus

function InitializeMenu()

{

  for(menuItemName in menu[0]) {

    if(menu[0][menuItemName] == "0") {

      document.getElementById(menuItemName+"_Submenu").style.visibility = "hidden";

      document.getElementById(menuItemName+"_Submenu").style.display = "none";

      document.getElementById(menuItemName+"_Lights").style.visibility = "visible";

      document.getElementById(menuItemName+"_Extend").style.backgroundImage = "url(" + IMAGES + "/global/general/plus.gif)";

    }

    else {

      document.getElementById(menuItemName+"_Submenu").style.visibility = "visible";

      document.getElementById(menuItemName+"_Submenu").style.display = "block";

      document.getElementById(menuItemName+"_Lights").style.visibility = "hidden";

      document.getElementById(menuItemName+"_Extend").style.backgroundImage = "url(" + IMAGES + "/global/general/minus.gif)";

    }

  }

}



// reconstruct the variable "self.name" out of the array menu

function SaveMenuArray()

{

  var stringSlices = "";

  var temp = "";

  for(menuItemName in menu[0]) {

    stringSlices = menuItemName + "=" + menu[0][menuItemName] + "&";

    temp = temp + stringSlices;

  }

  self.name = temp;

}



// onClick open or close submenus

function MenuItemAction(sourceId)

{

  if(menu[0][sourceId] == 1) {

    CloseMenuItem(sourceId);

  }

  else {

    OpenMenuItem(sourceId);

  }

}

function OpenMenuItem(sourceId)

{

  menu[0][sourceId] = 1;

  document.getElementById(sourceId+"_Submenu").style.visibility = "visible";

  document.getElementById(sourceId+"_Submenu").style.display = "block";

  document.getElementById(sourceId+"_Lights").style.visibility = "hidden";

  document.getElementById(sourceId+"_Extend").style.backgroundImage = "url(" + IMAGES + "/global/general/minus.gif)";

}

function CloseMenuItem(sourceId)

{

  menu[0][sourceId] = 0;

  document.getElementById(sourceId+"_Submenu").style.visibility = "hidden";

  document.getElementById(sourceId+"_Submenu").style.display = "none";

  document.getElementById(sourceId+"_Lights").style.visibility = "visible";

  document.getElementById(sourceId+"_Extend").style.backgroundImage = "url(" + IMAGES + "/global/general/plus.gif)";

}



// mouse-over effects of menubuttons and submenuitems

function MouseOverMenuItem(source)

{

  source.firstChild.style.visibility = "visible";

}

function MouseOutMenuItem(source)

{

  source.firstChild.style.visibility = "hidden";

}

function MouseOverSubmenuItem(source)

{

  source.style.backgroundColor = "#14433F";

}

function MouseOutSubmenuItem(source)

{

  source.style.backgroundColor = "#0D2E2B";

}





// display payment standby message

function PaymentStandBy(a_Source, a_Case)

{

  var m_Agree = false;

  if (a_Source == "setup" && a_Case != 1) {

    if (document.getElementById("CheckBoxAgreePayment").checked == true) {

      m_Agree = true;

    }

  }

  if (a_Source == "setup" && a_Case == 1) {

    if (document.getElementById("CheckBoxAgreePayment").checked == true && document.getElementById("CheckBoxAgreeSubscription").checked == true) {

      m_Agree = true;

    }

  }

  if (a_Source == "cancel") {

    m_Agree = true;

  }

  if (m_Agree == true) {

    document.getElementById("DisplayText").style.visibility = "hidden";

    document.getElementById("DisplayText").style.display = "none";

    document.getElementById("StandByMessage").style.visibility = "visible";

    document.getElementById("StandByMessage").style.display = "block";

    document.getElementById("DisplaySubmitButton").style.visibility = "hidden";

    document.getElementById("DisplaySubmitButton").style.display = "none";

    document.getElementById("DisplayBackButton").style.visibility = "hidden";

    document.getElementById("DisplayBackButton").style.display = "none";

  }

}





/** ------------------

 * Exit Point Analysis

 * -------------------

 */



// identify windows or linux client download

function NoteDownload(a_ClientType)

{

  parent.confirmclient.location = LINK_ACCOUNT + '/downloadaction.php?clienttype=' + a_ClientType;

}





/** -------------------------

 * functions related to forms 

 * --------------------------

 */



// set cursor focus in form (g_FormName) to field (g_FieldName)

function SetFormFocus()

{

  if (g_FormName.length > 0 && g_FieldName.length > 0 ) {

    l_SetFocus = true;

    if (g_FormName == 'AccountLogin') {

      if (document.getElementsByName('ACCOUNTLOGIN_ACCOUNTNAME')[0].value.length > 0) {

        l_SetFocus = false;

      } 

    }

    if (l_SetFocus == true) {

      document.forms[g_FormName].elements[g_FieldName].focus();

    }

  }

}



// set cursor focus in form (a_FormName) to field (a_FieldName)

function SetFormFocusToArguments(a_FormName, a_FieldName)

{

  if (a_FormName.length > 0 && a_FieldName.length > 0 ) {

//    alert("test");

    document.forms[a_FormName].elements[a_FieldName].focus();

    document.forms[a_FormName].elements[a_FieldName].focus();

    document.forms[a_FormName].elements[a_FieldName].focus();

    document.forms[a_FormName].elements[a_FieldName].blur();

    document.forms[a_FormName].elements[a_FieldName].blur();

    document.forms[a_FormName].elements[a_FieldName].blur();

  }

}



// toggle masked texts with readable texts

function ToggleMaskedText(a_TextFieldID)

{

  m_DisplayedText = document.getElementById('Display' + a_TextFieldID).innerHTML;

  m_MaskedText = document.getElementById('Masked' + a_TextFieldID).innerHTML;

  m_ReadableText = document.getElementById('Readable' + a_TextFieldID).innerHTML;

  if (m_DisplayedText == m_MaskedText) {

    document.getElementById('Display' + a_TextFieldID).innerHTML = document.getElementById('Readable' + a_TextFieldID).innerHTML;

    document.getElementById('Button' + a_TextFieldID).src = IMAGES + '/global/general/hide.gif';

  } else {

    document.getElementById('Display' + a_TextFieldID).innerHTML = document.getElementById('Masked' + a_TextFieldID).innerHTML;

    document.getElementById('Button' + a_TextFieldID).src = IMAGES + '/global/general/show.gif';

  }

}