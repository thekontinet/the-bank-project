import './charts'

document.addEventListener('alpine:init', () => {
    window.Alpine.data('progress', (endPoint) => ({
        pg: 0,

        pgText: "Please wait...",

        show: true,

        init() {
            this.start()
        },

        start() {
            setTimeout(()=>{
                this.pg += Math.floor(Math.random() * 15)
                if(this.pg > 20) this.pgText = "Connecting..."
                if(this.pg > 40) this.pgText = "Validating transaction... "
                if(this.pg > 60) this.pgText = "Processing... "
                if(this.pg > 85) this.pgText = "Completing transaction... "
                if(this.pg <= endPoint) this.start()
                if(this.pg >= endPoint) this.show = false
            }, 1000)
        }
    }))

    window.Alpine.data('kyc', () => ({
        docType: '',
        docNumber: '',
        frontImg: null,
        backImg: null,

        reset(){
            this.docNumber = ''
            this.docType = ''
            this.frontImg = null
            this.backImg = null
        },

        submit(){
            const formData = new FormData()
            formData.append('docType', this.docType);
            formData.append('docNumber', this.docNumber);
            formData.append('document_back_image', this.backImg);
            formData.append('document_front_image', this.frontImg);

            fetch('/kyc', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                console.log('File uploaded successfully!');
            })
            .catch(error => {
                console.error('Error uploading file:', error);
            });
        }
    }));

    window.Alpine.data('accountForm', () => ({
        sole: false,
        email: '',
        emails: [],
        max: 3,
        addEmail(email){
            const isEmail = email.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)
            const isMax = this.emails.length >= this.max
            if(!this.emails.includes(email) && email.trim().length && isEmail && !isMax){
                this.emails.push(email)
            }
            this.email = ''
        },
        removeEmail(email){
            this.emails = this.emails.filter(_email => _email != email)
        }
    }))
})

