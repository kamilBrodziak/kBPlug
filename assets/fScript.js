$(function() {
    let popUpDOM = $("#kBPPopUp");
    let popUp = new PopUp(popUpDOM, parseInt(popUpDOM.data('delay')), popUpDOM.data('repetition'),
        $("#kBPPopUpCloseButton"), [$('#kBPPopUpForm'), $('#kBPPopUpFormMobile')]);
    popUp.launch();
});

class PopUp {
    constructor(popUp, delay, repetition, closeButton, forms) {
        this.popUp = popUp;
        this.delay = delay;
        this.repetition = repetition;
        this.closeButton = closeButton;
        this.forms = forms;
        this.closeClicked = false;
        this.submitted = false;
        this.opened = false;
    }

    launch() {
        if(localStorage.getItem('isSubmitted') === null) {
            if (this.repetition === "") {
                // EVERY LAUNCH IF REPETITION NOT SET
                this.showPopUpWithDelay(this.delay);
                console.log('1');
            } else if (this.repetition !== localStorage.getItem('repetition')) {
                // FIRST LAUNCH WHEN REPETITION SET OR DIFFERENT REPETITION SET AND USER FOR THE FIRST TIME ENTER DOMAIN
                let repetitionOrder = 0;
                let dateLaunch = 0;
                localStorage.setItem('repetition', this.repetition);
                this.showPopUpInterval(dateLaunch, repetitionOrder, this.delay);
            } else if (this.repetition === localStorage.getItem('repetition')) {
                // NEXT LAUNCHES WHEN REPETITION SET AND WHEN USER AGAIN ENTER DOMAIN OR CHANGE PAGE
                let repetitionOrder = (localStorage.getItem('repetitionOrder') !== null) ? parseInt(localStorage.getItem('repetitionOrder')) : 0;
                let dateLaunch = (localStorage.getItem('dateLaunch') !== null) ? parseInt(localStorage.getItem('dateLaunch')) : 0;
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
                console.log('x');
                clearInterval(interval);
            } else if(Date.now() > dateLaunch && !self.opened && !self.closeClicked) {
                console.log('y');
                self.showPopUpWithDelay(delay);
            } else if(Date.now() > dateLaunch && !self.opened && self.closeClicked) {
                console.log('z');
                dateLaunch = Date.now() + (parseInt(repetitionArray[repetitionOrder]) * 60 * 1000);
                repetitionOrder = (++repetitionOrder % repetitionArray.length);
                localStorage.setItem('repetitionOrder', repetitionOrder.toString());
                localStorage.setItem('dateLaunch', dateLaunch.toString());
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
        for(let form in this.forms) {
            form.on('submit', function () {
                self.hidePopUp();
                self.submitted = true;
                localStorage.setItem('isSubmitted', 'true');
            });
        }
    }
}