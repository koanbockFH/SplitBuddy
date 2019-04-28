/**
 * Gibt die Möglichkeiten mehrere Karten im Vor und Rückseite zu erstellen und durchnavigieren zu können
 * @param cardIds : jedes Item mit active & passive seite - eine Unterscheidung von Vor und Rückseiten-element
 * @param callbackOnEachNavigation : Callback pro Navigation
 * @constructor
 */
function CardNavigation(cardIds, callbackOnEachNavigation)
{
    let cardIdList = cardIds;
    let currentIndex = 0;
    let that = this;

    /**
     * Prüfe ob Callback gesetzt wurde, wenn ja dann führe ihn aus
     */
    this.onEachNavigation = function(){
        if(callbackOnEachNavigation && typeof callbackOnEachNavigation === "function") {
            callbackOnEachNavigation();
        }
    };

    /**
     * gibt die Möglichkeit zum Hierarchisch nächsten zu Navigieren, sofern vorhanden
     */
    this.goNext = function()
    {
        that.onEachNavigation();
        if(currentIndex+1 >= cardIdList.length)
        {
            return;
        }
        currentIndex++;
        that.collapseAll();
        let nextCardActive = $(cardIdList[currentIndex].active);
        let nextCardPassive = $(cardIdList[currentIndex].passive);
        nextCardActive.collapse('show');
        nextCardPassive.collapse('hide');
    };

    /**
     * Gehe zu gegebenen Index
     * @param index : navigationsindex
     */
    this.goTo = function(index)
    {
        that.onEachNavigation();
        that.collapseAll();
        let selectedCardActive = $(cardIdList[index].active);
        let selectedCardPassive = $(cardIdList[index].passive);
        selectedCardActive.collapse('show');
        selectedCardPassive.collapse('hide');
        currentIndex = index;
    };

    /**
     * Schließe alle Karten
     */
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

    //Weiternavigieren
    nextButton.click(function(e){
        e.preventDefault();
        e.stopPropagation();
        //prüfe ob navigation durchgeführt werden kann mithilfe der optionalen CheckFunktion
        if(callbackCheckBeforeNext && typeof callbackCheckBeforeNext === "function" && callbackCheckBeforeNext())
        {
            //Prüfe ob eine Navigation oder etwas anderes passieren soll
            if(overrideNavigationNext && typeof overrideNavigationNext === "function") {
                overrideNavigationNext();
            }
            else{
                navigationManager.goNext();
            }
        }
        else{
            //Prüfe ob eine Navigation oder etwas anderes passieren soll
            if(overrideNavigationNext && typeof overrideNavigationNext === "function") {
                overrideNavigationNext();
            }
            else{
                navigationManager.goNext();
            }
        }
    });

    editButton.click(function(){
        //navigiere zu dieser Karte, um Werte zu bearbeiten
        navigationManager.goTo(index);
    });
}