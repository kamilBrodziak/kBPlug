let $ = jQuery.noConflict();
let popUp;
$(() => {
    popUp = new PopUp();
    popUp.loadAjax();
    // loadAjax();
});

// function loadAjax() {
//     const storageController = new StorageController();
//
//     if(!storageController.isSubmitted()) {
//         jQuery.ajax({
//             url: kBPlug.ajaxUrl,
//             type: 'POST',
//             data: {
//                 action: 'loadPopUpAjax',
//                 mode: (window.innerWidth >= 996) ? 'desktop' : 'mobile'
//             },
//             beforeSend: () => {
//             },
//             error: (response) => {
//                 console.log(response);
//             },
//             success: (response) => {
//                 const args = JSON.parse(response);
//                 $('body').append(args.js);
//                 storageController.setCustomRepetition(args.repetition).loadRepetitionIntoLS();
//                 const popUpController = new PopUpController(storageController, $(args.content), args.delay);
//                 popUpController.launch();
//
//             }
//         });
//     }
// }

function onKBPPopUpSubmit(token) {
    popUp.form.trigger('submit', [{hide: false}]);
    popUp.hide();
}

class PopUp {
    constructor() {
        this.popUp = null;
        this.delay = null;
        this.repetition = null;
        this.closeButton = null;
        this.form = null;
        this.closeClicked = false;
        this.submitted = false;
        this.opened = false;
        this.displayClass = "kBPPopUpDisplay";
        this.body = $(document.body);
        this.repetitionLS = 'kBPRepetition';
        this.repetitionLSDateLaunch = 'kBPRepetitionDateLaunch';
        this.repetitionLSOrder = 'kBPRepetitionOrder';
        this.repetitionLSOneTime = 'kBPRepetitionOneTime';
    }

    launch() {
        if (this.repetition === "") {
            // EVERY LAUNCH IF REPETITION NOT SET
            this.show(this.delay);
            this.resetRepetition();
        } else {
            if(this.repetition !== window.localStorage.getItem(this.repetitionLS)) {
                // FIRST LAUNCH WHEN REPETITION SET OR DIFFERENT REPETITION SET AND USER FOR THE FIRST TIME ENTER DOMAIN
                window.localStorage.setItem(this.repetitionLS, this.repetition);
                this.showInterval(0, 0, this.delay);
            } else {
                // NEXT LAUNCHES WHEN REPETITION SET AND WHEN USER AGAIN ENTER DOMAIN OR CHANGE PAGE
                const orderLS = window.localStorage.getItem(this.repetitionLSOrder),
                    dateLaunchLS = window.localStorage.getItem(this.repetitionLSDateLaunch);
                const repetitionOrder = (orderLS !== null) ? parseInt(orderLS, 10) : 0;
                const dateLaunch = (dateLaunchLS !== null) ? parseInt(dateLaunchLS, 10) : 0;
                this.showInterval(dateLaunch, repetitionOrder, (Date.now() > dateLaunch) ? this.delay : 0);
            }
        }
    }

    resetRepetition() {
        window.localStorage.removeItem(this.repetitionLS);
        window.localStorage.removeItem(this.repetitionLSOrder);
        window.localStorage.removeItem(this.repetitionLSDateLaunch);
    }

    loadAjax() {
        const _this = this;
        if(window.localStorage.getItem('isSubmittedd') === null) {
            jQuery.ajax({
                url: kBPlug.ajaxUrl,
                type: 'POST',
                data: {
                    action: 'loadPopUpAjax',
                    mode: (window.innerWidth >= 996) ? 'desktop' : 'mobile'
                },
                beforeSend: () => {
                },
                error: (response) => {
                    console.log(response);
                },
                success: (response) => {
                    const args = JSON.parse(response);
                    if(args.repetition === '-1') {
                        if(window.localStorage.getItem(_this.repetitionLSOneTime) !== null) {
                            return;
                        }
                        window.localStorage.setItem(_this.repetitionLSOneTime, 'true');
                    } else {
                        if(window.localStorage.getItem(_this.repetitionLSOneTime) !== null) {
                            window.localStorage.removeItem(_this.repetitionLSOneTime);
                        }
                    }

                    _this.popUp = $(args.content);
                    _this.repetition = args.repetition;
                    _this.delay = args.delay;
                    _this.closeButton = _this.popUp.find('#kBPPopUpCloseButton');
                    _this.form = _this.popUp.find('#kBPPopUpForm');
                    _this.launch();
                }
            });
        }
    }

    showInterval(dateLaunch, repetitionOrder, delay) {
        const repetitionArray = this.repetition.split(';').map((el, i) => parseInt(el, 10)),
            _this = this;
        const interval = setInterval(function() {
            if(_this.submitted) {
                clearInterval(interval);
            } else if(Date.now() > dateLaunch && !_this.opened) {
                if(!_this.closeClicked) {
                    _this.show(delay);
                } else {
                    dateLaunch = Date.now() + (repetitionArray[repetitionOrder] * 60000);
                    repetitionOrder = (++repetitionOrder % repetitionArray.length);
                    window.localStorage.setItem(_this.repetitionLSOrder, repetitionOrder.toString());
                    window.localStorage.setItem(_this.repetitionLSDateLaunch, dateLaunch.toString());
                    _this.closeClicked = false;
                }
            }
        },1000);
    }

    show(delay) {
        const _this = this;
        this.body.addClass(_this.displayClass);
        this.opened = true;
        _this.addCloseEvent();
        _this.addSubmitEvent();
        setTimeout(() => {
            _this.body.append(_this.popUp);
            _this.body.addClass(_this.displayClass);
        }, delay * 1000);
    }

    addCloseEvent() {
        const _this = this;
        this.closeButton.on('click', (e) => {
            e.preventDefault();
            _this.hide();
            _this.closeClicked = true;
            _this.opened = false;
        });
    }

    addSubmitEvent() {
        const _this = this;
        this.form.on('submit', (e, json) => {
            if(!grecaptcha.getResponse()) {
                e.preventDefault();
                grecaptcha.execute();
            } else {
                _this.submitted = true;
                window.localStorage.setItem('isSubmitted', 'true');
                if(json && json.hide) {
                    _this.hide();
                }
            }
        });
    }

    hide() {
        this.popUp.remove();
        this.body.removeClass(this.displayClass);
    }
}