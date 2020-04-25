$(document).ready(function($) {
    let mediaUploadInputs = {
        'uploadButtonForkBPPopUpImageContent': {
            "hiddenInputId" : "kBPPopUpImageContent",
            "imgTagId": "imgkBPPopUpImageContent",
            "mediaUploaderTitle": "Choose a pop up picture"
        },
        'uploadButtonForkBPPopUpImageMobileContent': {
            "hiddenInputId" : "kBPPopUpImageMobileContent",
            "imgTagId": "imgkBPPopUpImageMobileContent",
            "mediaUploaderTitle": "Choose a mobile pop up image"
        }
    };

    for(let buttonID in mediaUploadInputs) {
        $('#' + buttonID).on('click', function (e) {
            e.preventDefault();
            let mediaUploader = wp.media.frames.file_frame = wp.media({
                title: mediaUploadInputs[buttonID]['mediaUploaderTitle'],
                button: {
                    text: 'Choose picture'
                },
                multiple: false
            });

            mediaUploader.on('select', function() {
                let attachment = mediaUploader.state().get('selection').first().toJSON();
                $("#" + mediaUploadInputs[buttonID]['hiddenInputId'] ).val(attachment.url);
                $("#" + mediaUploadInputs[buttonID]['imgTagId']).attr('src', attachment.url);
            });
            mediaUploader.open();
        });
    }

    let popUpMenu = new Menu($('.kBPluginSettingsWithMenu'), $('.kBPluginMenu'), 'active');
    popUpMenu.addMenu();
});

class Menu {
    constructor(container, menulist, activeTabClass) {
        this.container = container;
        this.menulist = menulist;
        this.activeTabClass = activeTabClass;
        this.listItemIds = [];
    }

    addMenu() {
        this.addMenuItemsIds();
        this.addClassForWPFormElements('h2');
        this.addClassForWPFormElements('table');
        this.addChangingMenuTabs();
    }

    addMenuItemsIds() {
        this.listItemIds = [];
        let self = this;
        self.menulist.children("li").each(function() {
            self.listItemIds.push($(this).attr('id'));
        });
    }

    addClassForWPFormElements(elemType) {
        let number = 0;
        let self = this;
        self.container.children(elemType).each( function() {
            $(this).addClass("hookFor-" + self.listItemIds[number++]);
        });
    }

    addChangingMenuTabs() {
        let self = this;
        self.menulist.children('li').each(function() {
            $(this).on('click', function() {
                let previouslyActive = self.menulist.find('li.' + self.activeTabClass);
                previouslyActive.removeClass(self.activeTabClass);
                self.hideElemOfContainerByClass('table.hookFor-' + previouslyActive.attr('id'));
                self.hideElemOfContainerByClass('h2.hookFor-' + previouslyActive.attr('id'));
                let newActive = $(this);
                newActive.addClass(self.activeTabClass);
                self.showElemOfContainerByClass('table.hookFor-' + newActive.attr('id'));
                self.showElemOfContainerByClass('h2.hookFor-' + newActive.attr('id'));
            })
        });
    }

    hideElemOfContainerByClass(selector) {
        this.container.find(selector).hide();
    }

    showElemOfContainerByClass(selector) {
        this.container.find(selector).show();
    }
}