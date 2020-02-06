let categories = document.querySelectorAll('.tags>a')
// let articles = document.querySelectorAll('article.news-article')

let articlesArray = Array.prototype.slice.call(document.querySelectorAll('article.news-article'));

for ( var i = 0; i < categories.length; i++){
    let theCategory = categories[i]
    theCategory.addEventListener('click', function(event){

        for ( var i = 0; i < articlesArray.length ; i++)
        {
            let article = articlesArray[i];

        if (article.classList.contains(theCategory.classList.toString())){
            article.classList.add('display');
        }
        else {article.classList.remove('display');}
    }
})
}