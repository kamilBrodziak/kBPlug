$(function($) {
    let aceEditor = new AceEditor("kBPCustomCSSEditor");
    aceEditor.addUpdatingTextarea('kBPCustomCSS', 'kBPCustomCSSForm');
});

class AceEditor {
    constructor(editorID) {
        this.aceEditor = ace.edit(editorID);
        this.aceEditor.setTheme('ace/theme/monokai');
        this.aceEditor.getSession().setMode('ace/mode/css');
    }

    addUpdatingTextarea(textareaID, formID) {
        let self = this;
        $("#" + formID).on('submit', function() {
            let value = self.aceEditor.getSession().getValue();
            $("#" + textareaID).val(value);
        })
    }
}