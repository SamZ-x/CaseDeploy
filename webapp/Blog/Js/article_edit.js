$(function(ev){

    //retrieve the article from database
    GetSelectedArticleData();

});

function GetSelectedArticleData(){
    //prepare request
    // let userid = $('#loginId').attr('value');
    let articleid = $('input[name=articleid]').attr('value');
    let sendData = {
        'action':'getSingleArticle',
        'articleid':articleid,

    };
    console.log(sendData);
    //request data
    AjaxRequest('../Route/route.php', 'POST', sendData, 'json', GetSelectedArticleSuccess, ErrorHandler );
}

function GetSelectedArticleSuccess(SuccessRespond, textStatus){
    console.log(SuccessRespond);
    //fill the data into the input 
    const article = SuccessRespond['data'];
    $('input[name=title]').val(article['title']);
    $('textarea[name=description]').val(article['description']);
    $('textarea[name=markdown]').val(article['markdown']);
}

/*****************************
Function Name: AjaxRequest
Description: request data from service
Parameters: url(server/service URL), type(GET POST PUT DELETE PATCH), 
            dataset(key information), dataType(return data type,html is default, text, json), 
            successFuction(execute request successfully), errorFunction(execute request failed)
Return: data in desired formate
*****************************/
function AjaxRequest(url, type, dataset, dataType, successFuction, errorFunction )
{
    let ajaxOptions = {}; // empty ajax settings/config container
    ajaxOptions['url'] = url; // Where : assign server/service URL
    ajaxOptions['type'] = type; // How : GET POST PUT DELETE PATCH
    ajaxOptions['data'] = dataset; // What do  you want to send ?
    ajaxOptions['dataType'] = dataType; // html is default, text, json
    ajaxOptions['success'] = successFuction; // DOOONOOTT Call it !! SuccessCallback()
    ajaxOptions['error'] = errorFunction;
    $.ajax( ajaxOptions ); 
}

/*****************************
Function Name: ErrorHandler
Description: handler the error when the Ajaxrequest fail
Parameters: requestor, textStatus, errorThrown
Return: no return
*****************************/
function ErrorHandler( requestor, textStatus, errorThrown )
{
    //error message for debugging
    let errorString = "Result:  "+ textStatus +" - "+ errorThrown;
    console.log(requestor);
    console.log(errorString);
}