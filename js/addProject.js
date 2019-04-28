//registriere die Project Funktionen
(function() {
    'use strict';
    window.addEventListener('load', function() {
        let p = new Project("#projectHeader", "#title", "#comment", "RadioGruppenEinstellung", "#amount", "RadioSortierKriterien");
    }, false);
})();

function Project(projectHeaderId, titleId, anmerkungId, gruppenEinstellungName, anzahlId, sortierName)
{
    let that = this;
    let projectHeader = $(projectHeaderId);

    //Hole Werte/Inputfelder die später an Backend gesendet werden
    let title = $(titleId);
    let anmerkung = $(anmerkungId);
    let anzahl = $(anzahlId);

    this.getGruppenEinstellung = function(){ return parseInt($("input[name='"+gruppenEinstellungName+"']:checked").val())};
    this.getSortierung = function(){ return parseInt($("input[name='"+sortierName+"']:checked").val())};

    //bei jeder Änderung der gruppenEinstellungen schauen ob indiv. Gruppen angezeigt werden müssen
    $("input[name='"+gruppenEinstellungName+"']").each(function(i, obj) {
        obj.addEventListener("change", function(e){
           if(this.value == 2)
           {
               $("#indvGruppe-passive").removeClass("d-none");
           }
           else{
               $("#indvGruppe-passive").addClass("d-none");
           }
       });
    });


    /**
     * Setze Projektüberschrift auf Projektname sobald einer gesetzt ist
     */
    this.setProjectHeader = function(){
        if(title.val() && title.val().length > 0)
        {
            projectHeader.html(title.val());
        }
        else{
            projectHeader.html("Neues Projekt");
        }
    };

    /**
     * Setze für Passive/Eingeklappte Teile die Fehlermeldung sofern nötig
     * @param result
     * @param id
     */
    this.setCardError = function(result, id)
    {
        if(result === false)
        {
            $(id).addClass('sb-card-error');
        }
        else{
            $(id).removeClass('sb-card-error');
        }
    };

    /**
     * Prüfe ob alle Vorraussetzungen im Basisinformationsteil erfüllt sind
     * @returns {boolean}
     */
    this.checkBasisInfo = function()
    {
        let form = $("#sb-basisinformation-form");
        let result = form[0].checkValidity();
        form.addClass('was-validated');

        that.setCardError(result, "#basisinfo-passive");
        that.setProjectHeader();
        return result;
    };

    /**
     * Prüfe ob alle Vorraussetzungen im Teilnehmerteil erfüllt sind
     */
    this.checkTeilnehmer = function()
    {
        let result = validateTeilnehmer();
        that.setCardError(result, "#teilnehmer-passive");
        return result;
    };

    /**
     * Prüfe ob alle Vorraussetzungen im Einstellungsteil erfüllt sind
     * @returns bool
     */
    this.checkEinstellungen = function()
    {
        if(that.getGruppenEinstellung() === 2)
        {
            that.setCardError(true, "#einstellungen-passive");
            return true;
        }

        validateAmount();
        let result =  $("#amount").hasClass("is-valid");

        that.setCardError(result, "#einstellungen-passive");
        return result;
    };

    /**
     * Prüfe ob alle Vorraussetzungen im Indiv. Gruppenteil erfüllt sind
     */
    this.checkIndvGruppe = function()
    {
        //If not Indiv. Group -> ignore
        if(that.getGruppenEinstellung() !== 2)
        {
            return true;
        }

        let result = validateGroup();
        that.setCardError(result, "#indvGruppe-passive");
        return result;
    };

    /**
     * Sende Anfrage für Resultat, und leite ggf. weiter bei erfolgreicher Anfrage
     */
    this.getResult = function(){
        if(that.checkBasisInfo() & that.checkEinstellungen() & that.checkTeilnehmer() & that.checkIndvGruppe())
        {
            console.log("Values:");
            console.log(title.val());
            console.log(anmerkung.val());
            console.log(teilnehmerDaten);
            console.log(that.getGruppenEinstellung());
            console.log(anzahl.val() || 0);
            console.log(that.getSortierung());
            console.log(indivGroupList);

            console.warn("Call to Service not Implemented!");
        }
    };

    //Initialisiere Navigation von Projekterstellungsseite
    let navigation = new CardNavigation([{active:"#basisinfo-active", passive:"#basisinfo-passive"},
                                        {active:"#teilnehmer-active", passive:"#teilnehmer-passive"},
                                        {active:"#einstellungen-active", passive:"#einstellungen-passive"},
                                        {active:"#indvGruppe-active", passive:"#indvGruppe-passive"}], that.setProjectHeader);

    this.basisCard = new StandardCard("#basisinfo-submit", "#basisinfo-edit", navigation, 0, that.checkBasisInfo);
    this.teilnehmerCard = new StandardCard("#teilnehmer-submit", "#teilnehmer-edit", navigation, 1, that.checkTeilnehmer);
    this.einstellungCard = new StandardCard("#einstellungen-submit", "#einstellungen-edit", navigation, 2, that.checkEinstellungen, () => {
        if(that.getGruppenEinstellung() === 2)
        {
            navigation.goNext();
        }
        else{
            that.getResult();
        }
    });
    this.indvGruppeCard = new StandardCard("#indivGroup-submit", "#indvGruppe-edit", navigation, 3, that.checkIndvGruppe, that.getResult);
}