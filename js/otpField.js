class otpField {
    constructor(node, digit) {
        this.node = node;
        this.digit = digit;
        this.createFields();
    }
    createFields() {
        this.node.innerHTML = "";
        for (let i = 0; i < this.digit; i++)
            this.node.append("<input type='number'/>");
        this.node.append("<input type='hidden' id='otp' name='otp'/>");
        this.otpField = $("#otp");
        this.fileds = this.node.$("input");
        let l = this;
        this.fileds.perform((n, i, no) => {
            n.addEventListener("keydown", function (e) {
                this.select();
                let j;
                if (e.key == "Backspace") {
                    if (n.value == "") j = i > 0 ? i - 1 : 0;
                    else j = i;
                } else {
                    n.value = n.value.substring(0, 1);
                    j = i < no.length - 1 ? i + 1 : i;
                }
                setTimeout(() => {
                    no[j].focus();
                    l.setOTP();
                }, 0);
            });
        });
    }
    setOTP() {
        let otp = "";
        for (let i = 0; i < this.digit; i++) otp += this.fileds[i].value;
        this.otpField.value = otp;
    }
    createError() {
        this.fileds.perform((n,i,no) => {
            n.addClass("error");
            no[0].focus();
        });
    }
}
