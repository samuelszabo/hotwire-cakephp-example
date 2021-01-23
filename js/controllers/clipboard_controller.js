// hello_controller.js
import {Controller} from "stimulus"

export default class extends Controller {
    static get targets() {
        return ["source"]
    }

    connect() {
        if (document.queryCommandSupported("copy")) {
            this.element.classList.add("clipboard--supported")
        }
    }

    copy() {
        event.preventDefault()  //because of a link
        this.sourceTarget.select()
        document.execCommand("copy")
    }
}
