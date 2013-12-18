/************************************************************
 Name        : Common.js
 Description : Declare global functions.
 Version     : 1.0
 Auther      : Prakash Panchal
 ************************************************************/
/**
 * function openColorBox() 
 * for open url into color box.
 */

function openColorBox(urls, smWidth, smHeight)
{
    smWidth = (smWidth > 0) ? smWidth : "840px";
    smHeight = (smHeight > 0) ? smHeight : "500px";
    $('.ajax').colorbox({
        href: urls,
        width: smWidth,
        height: smHeight,
        iframe: true,
        scrolling: false
    });
}

/**
 * function ajaxRequest()
 * for make ajax request to perform any action.
 * @param string ssActionUrl
 * @param string ssData
 * @param string ssUpdatedDivId
 * @param string ssLoaderDivId
 * 
 * return none
 */
function ajaxRequest(ssActionUrl, ssData, ssUpdatedDivId, ssLoaderDivId)
{
    $.ajax({
        url: ssActionUrl,
        type: "POST",
        data: ssData,
        beforeSend: function() {
            $("#" + ssLoaderDivId).show();
        },
        success: function() {
            $("#" + ssLoaderDivId).hide();
            $("#" + ssUpdatedDivId).hide();
        },
        error: function() {
            $("#" + ssLoaderDivId).hide();
            $("#" + ssUpdatedDivId).show();
        }
    });
    return true;
}
function ajaxCall(requestPage,arg,divId,cssClass,hgt)
{
    document.getElementById(divId).innerHTML = "";
    //document.getElementById(divId).style.width = "16px";
    document.getElementById(divId).style.height = hgt;
    document.getElementById(divId).className = cssClass;

    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById(divId).className = " ";
            document.getElementById(divId).style.width = "auto";
            document.getElementById(divId).style.height = "auto";
            document.getElementById(divId).innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", requestPage  + "?q="+arg,true);
    xmlhttp.send();
}