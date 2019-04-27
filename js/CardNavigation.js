function CardNavigation(cardIds, callbackOnEachNavigation)
{
    let cardIdList = cardIds;
    let that = this;

    this.onEachNavigation = function(){
        if(callbackOnEachNavigation && typeof callbackOnEachNavigation === "function") {
            callbackOnEachNavigation();
        }
    };

    this.goNext = function(currentIndex)
    {
        that.onEachNavigation();
        if(currentIndex+1 >= cardIdList.length)
        {
            return;
        }
        that.collapseAll();
        let nextCardActive = $(cardIdList[currentIndex+1].active);
        let nextCardPassive = $(cardIdList[currentIndex+1].passive);
        nextCardActive.collapse('show');
        nextCardPassive.collapse('hide');
    };

    this.goTo = function(currentIndex)
    {
        that.onEachNavigation();
        that.collapseAll();
        let selectedCardActive = $(cardIdList[currentIndex].active);
        let selectedCardPassive = $(cardIdList[currentIndex].passive);
        selectedCardActive.collapse('show');
        selectedCardPassive.collapse('hide');
    };

    this.collapseAll = function collapseAll()
    {
        cardIdList.forEach(card => {
            $(card.active).collapse('hide');
            $(card.passive).collapse('show');
        });
    }
}

function StandardCard(nextButtonId, editButtonId, navigation, navigationIndex, callbackCheckBeforeNext, overrideNavigationNext)
{
    let nextButton = $(nextButtonId);
    let editButton = $(editButtonId);
    let index = navigationIndex;
    let navigationManager = navigation;

    nextButton.click(function(e){
        e.preventDefault();
        e.stopPropagation();
        if(callbackCheckBeforeNext && typeof callbackCheckBeforeNext === "function" && callbackCheckBeforeNext())
        {
            if(overrideNavigationNext && typeof overrideNavigationNext === "function") {
                overrideNavigationNext();
            }
            else{
                navigationManager.goNext(index);
            }
        }
        else{
            navigationManager.goNext(index);
        }
    });

    editButton.click(function(){
        navigationManager.goTo(index);
    });
}