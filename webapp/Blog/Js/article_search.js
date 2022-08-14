var articles;

$(function(ev){
    
    //load current account data
    $('button[name="submit"]').on('click', SearchArticles)
});


/*****************************
Function Name: GetAccountData
Description: get the articles of the current logined account
Parameters: no parameter
Return: no return, display users info in table format
*****************************/
function SearchArticles(){

    //prepare data for server
    let searchInfo = $('input#searchInfo').val();
    let searchCategory = $('select#searchCategory option:selected').val();
    let sendData = {
        'action':'select',
        'endpoint':'globalsearch',
        'searchCategory': searchCategory,
        'searchInfo':searchInfo
    };

    console.log(sendData);
    //request data
    AjaxRequest('../Route/route.php', 'GET', sendData, 'json', SearchArticlesSuccess, ErrorHandler );
}

/*****************************
Function Name: GetDataSuccess
Description: diplay articles
Parameters: SuccessRespond: responding data from the service, textStatus: Ajaxrequest result status 
Return: no return
*****************************/
function SearchArticlesSuccess(SuccessRespond, textStatus){
    //update style
    let introSection = $('section#intro');
    introSection.addClass('d-none')
    let searchbar_container = $('div#searchbar_container');
    searchbar_container.removeClass('p-5');
    
    //debug
    console.log(SuccessRespond);
    
    //target the container
    let articleList = $('#articles');
    articleList.empty();
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
        text.innerHTML = "Oop! No articles!";
        
        EmptyMessage.append(text);
        articleList.append(EmptyMessage);
    }

    //read more action
    $('button[name="btnReadMore"]').on('click', GetArticleContent);
}

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
    article_Card_Frame.classList.add("card", "bg-light","h-100");
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

    //combine all elements
    article_Card.append(Card_Title, Card_date, Card_Description,Card_Readmore);
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
