$(function() {
    let popUpDOM = $("#kBPPopUp");
    let popUp = new PopUp(popUpDOM, parseInt(popUpDOM.data('delay'), 10), popUpDOM.data('repetition'),
        $("#kBPPopUpCloseButton"), ['kBPPopUpForm', 'kBPPopUpFormMobile']);
    popUp.launch();
});

class PopUp {
    constructor(popUp, delay, repetition, closeButton, formIDs) {
        this.popUp = popUp;
        this.delay = delay;
        this.repetition = repetition;
        this.closeButton = closeButton;
        this.formIDs = formIDs;
        this.closeClicked = false;
        this.submitted = false;
        this.opened = false;
    }

    launch() {

        if(window.localStorage.getItem('isSubmitted') === null) {
            if (this.repetition === "") {
                // EVERY LAUNCH IF REPETITION NOT SET
                this.showPopUpWithDelay(this.delay);
            } else if (this.repetition !== window.localStorage.getItem('repetition')) {
                // FIRST LAUNCH WHEN REPETITION SET OR DIFFERENT REPETITION SET AND USER FOR THE FIRST TIME ENTER DOMAIN
                let repetitionOrder = 0;
                let dateLaunch = 0;
                window.localStorage.setItem('repetition', this.repetition);
                this.showPopUpInterval(dateLaunch, repetitionOrder, this.delay);
            } else if (this.repetition === window.localStorage.getItem('repetition')) {
                // NEXT LAUNCHES WHEN REPETITION SET AND WHEN USER AGAIN ENTER DOMAIN OR CHANGE PAGE
                let repetitionOrder = (window.localStorage.getItem('repetitionOrder') !== null) ?
                    parseInt(window.localStorage.getItem('repetitionOrder'), 10) : 0;
                let dateLaunch = (window.localStorage.getItem('dateLaunch') !== null) ?
                    parseInt(window.localStorage.getItem('dateLaunch'), 10) : 0;
                let delay = (Date.now() > dateLaunch) ? this.delay : 0;
                this.showPopUpInterval(dateLaunch, repetitionOrder, delay);
            }
        }
    }

    showPopUpInterval(dateLaunch, repetitionOrder, delay = 0) {
        let repetitionArray = this.repetition.split(';');
        let self = this;
        let interval = setInterval(function () {
            if(self.submitted) {
                clearInterval(interval);
            } else if(Date.now() > dateLaunch && !self.opened && !self.closeClicked) {
                self.showPopUpWithDelay(delay);
            } else if(Date.now() > dateLaunch && !self.opened && self.closeClicked) {
                dateLaunch = Date.now() + (parseInt(repetitionArray[repetitionOrder], 10) * 60 * 1000);
                repetitionOrder = (++repetitionOrder % repetitionArray.length);
                window.localStorage.setItem('repetitionOrder', repetitionOrder.toString());
                window.localStorage.setItem('dateLaunch', dateLaunch.toString());
                self.closeClicked = false;
            }
        }, 100);
    }

    showPopUpWithDelay(delay = this.delay) {
        let self = this;
        this.opened = true;
        setTimeout(function() {
            self.showPopUp();
            self.addCloseButton();
        }, delay * 1000);
    }

    showPopUp() {
        this.popUp.addClass('kBPPopUpShow');
        $('body').addClass('kBPPopUpShow');
    }

    hidePopUp() {
        this.popUp.removeClass('kBPPopUpShow');
        $('body').removeClass('kBPPopUpShow');
    }

    addCloseButton() {
        let self = this;
        this.closeButton.on('click', function () {
            self.hidePopUp();
            self.closeClicked = true;
            self.opened = false;
        });
    }

    hideForeverAfterSubmit() {
        let self = this;
        for(let formID in this.formIDs) {
            $('#' + formID).on('submit', function () {
                self.hidePopUp();
                self.submitted = true;
                window.localStorage.setItem('isSubmitted', 'true');
            });
        }
    }
}