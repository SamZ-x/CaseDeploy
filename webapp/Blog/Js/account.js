//article container
var articles;

$(function(ev){
    //load current account data
    GetAccountData();

});


/*****************************
Function Name: GetAccountData
Description: get the articles of the current logined account
Parameters: no parameter
Return: no return, display users info in table format
*****************************/
function GetAccountData(){

    //prepare request
    let userid = $('#loginId').attr('value');
    let sendData = {
        'action':'getUserArticles',
        'userid': userid,
    };
    console.log(sendData);
    //request data
    AjaxRequest('../Route/route.php', 'POST', sendData, 'json', GetDataSuccess, ErrorHandler );

}

/*****************************
Function Name: GetDataSuccess
Description: diplay articles
Parameters: SuccessRespond: responding data from the service, textStatus: Ajaxrequest result status 
Return: no return
*****************************/
function GetDataSuccess(SuccessRespond, textStatus){
    console.log(SuccessRespond);
    
    //target the container
    let articleList = $('#articles');
    articles = SuccessRespond['data'];
    console.log(articles);
    //display data or empty data message
    if(articles.length != 0){
        for(const article of articles){
            articleList.append(CreateArticleCard(article));
        }
    }
    else{
        let EmptyMessage = document.createElement('div');
        EmptyMessage.classList.add("col-md-12", "p-5");

        let text = document.createElement('h1');
        text.innerHTML = "No articles! Create an new Article!";
        
        EmptyMessage.append(text);
        articleList.append(EmptyMessage);
    }

    //read more action
    $('button[name="btnReadMore"]').on('click', GetArticleContent);
    //delete action
    $('button[name="btnDelete"]').on('click', DeleteArticle);
    //edit action
    // $('button[name="btnEdit"]').on('click', EditArticle);
}

/*****************************
Function Name: DeleteArticle
Description: delete the selected article
Parameters: no parameter
Return: no return
*****************************/
function DeleteArticle(){
    //prepare request
    let articleId = this.value;//attr('value');
    let sendData = {
        'action':'deleteArticle',
        'articleid': articleId,
    };

    console.log(sendData);
    //request data
    AjaxRequest('../Route/route.php', 'POST', sendData, 'json', DeleteArticleSuccess, ErrorHandler );
}

/*****************************
Function Name: DeleteArticleSuccess
Description: diplay articles
Parameters: SuccessRespond: responding data from the service, textStatus: Ajaxrequest result status 
Return: no return
*****************************/
function DeleteArticleSuccess(SuccessRespond, textStatus){
    console.log(SuccessRespond);
    //target the container
    let articleList = $('#articles');
    articleList.empty();
    //get the latest article list
    GetAccountData();
}

/*****************************
Function Name: DeleteArticle
Description: delete the selected article
Parameters: no parameter
Return: no return
*****************************/
function EditArticle(){
    //prepare request
    let articleId = this.value;//attr('value');
    let sendData = {};
    sendData['action'] = 'editArticle';
    // sendData['endpoint'] = 'article';
    sendData['articleId'] = articleId;

    console.log(sendData);
    //request data
    AjaxRequest('../Route/route.php', 'POST', sendData, 'json', EditArticleSuccess, ErrorHandler );
}

/*****************************
Function Name: DeleteArticleSuccess
Description: diplay articles
Parameters: SuccessRespond: responding data from the service, textStatus: Ajaxrequest result status 
Return: no return
*****************************/
function EditArticleSuccess(SuccessRespond, textStatus){
    console.log(SuccessRespond);
    //target the container
    let articleList = $('#articles');
    articleList.empty();
    //get the latest article list
    GetAccountData();
}


 
//************** Helper Methods *****************//

/*****************************
Function Name: GetArticleContent
Description: Get the selected article content 
Parameters: none 
Return: none
*****************************/
function GetArticleContent(ev){
    //get target articleId
    let targetId = this.value;
    console.log(targetId);
    //match the target article
    for(const article of articles){
        if(article['articleId'] == targetId){
            DisplayArticle(article);
            return;
        }
    }
}

/*****************************
Function Name: DisplayArticle
Description: Display the content of the selected article
Parameters: single article data 
Return: No return
*****************************/
function DisplayArticle(article){

    let article_head = document.createElement('div');
    article_head.classList.add("modal-header", "h1");
    article_head.innerHTML = article['title'];

    let article_body = document.createElement('div');
    article_body.classList.add("modal-body");
    article_body.innerHTML = article['sanitizedHtml'];

    let content = $('#articleContent');
    content.empty();
    content.append(article_head, article_body);
}


/*****************************
Function Name: CreateArticleCard
Description: Create an article display as card
Parameters: single article data 
Return: HTML element
*****************************/
function CreateArticleCard(article){
    
    //create new elements and add class
    let article_Frame = document.createElement('div');
    article_Frame.classList.add("col-md-4");

    let article_Card_Frame = document.createElement('div');
    article_Card_Frame.classList.add("card", "bg-white","h-100");
    article_Card_Frame.setAttribute("id",'articleId' );

    let article_Card = document.createElement('div');
    article_Card.classList.add("card-body", "text-start");

    let Card_Title = document.createElement('h2');
    Card_Title.classList.add("card-title", "mb-2");
    //add article data
    Card_Title.innerHTML = article['title'];

    let Card_date = document.createElement('p');
    Card_date.classList.add("card-text");
    //add article data
    Card_date.innerHTML = article['createdAt'];

    let Card_Description = document.createElement('p');
    Card_Description.classList.add("card-text");
    //add article data
    Card_Description.innerHTML = article['description'];;

    let Card_Readmore = document.createElement('button');
    Card_Readmore.classList.add("btn","btn-primary", "mx-1");
    let attrs_readmore = {
        "name": "btnReadMore",
        "value":article['articleId'],
        "data-bs-toggle": "modal",
        "data-bs-target": "#readmore"
    }
    SetMultipleAttr(Card_Readmore, attrs_readmore);
    Card_Readmore.innerHTML = "Read More";

    let Card_Edit = document.createElement('a');
    Card_Edit.href="./article_edit.php?articleId="+article['articleId'];
    Card_Edit.classList.add("btn", "btn-primary", "mx-1");
    let attrs_edit = {
        "name": "btnEdit",
        "value":article['articleId'],
    }
    SetMultipleAttr(Card_Edit, attrs_edit);
    Card_Edit.innerHTML = "Edit";

    let Card_delete = document.createElement('button');
    Card_delete.classList.add("btn","btn-primary", "mx-1");
    let attrs_delete = {
        "name": "btnDelete",
        "value":article['articleId'],
    }
    SetMultipleAttr(Card_delete, attrs_delete);
    Card_delete.innerHTML = "Delete";

    //combine all elements
    article_Card.append(Card_Title, Card_date, Card_Description,Card_Readmore, Card_Edit,Card_delete);
    article_Card_Frame.append(article_Card);
    article_Frame.append(article_Card_Frame);

    return article_Frame;
}

/*****************************
Function Name: SetMultipleAttr
Description: set up multiple attributes for html element
Parameters: target element, attributes array 
Return: none
*****************************/
function SetMultipleAttr(element, attrArr){
    for(const attr in attrArr){
        element.setAttribute(attr, attrArr[attr]);
    }
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
