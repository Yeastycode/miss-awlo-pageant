var countries = ["Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo", "The Democratic Republic of The", "Cook Islands", "Costa Rica", "Cote D’ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-bissau", "Guyana", "Haiti", "Heard Island and Mcdonald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Islamic Republic of", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea", "Democratic People’s Republic of", "Korea", "Republic of", "Kuwait", "Kyrgyzstan", "Lao People’s Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macao", "Macedonia", "The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia", "Federated States of", "Moldova", "Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Palestinian Territory", "Occupied", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Helena", "Saint Kitts and Nevis", "Saint Lucia", "Saint Pierre and Miquelon", "Saint Vincent and The Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and The South Sandwich Islands", "Spain", "Sri Lanka", "Sudan", "Suriname", "Svalbard and Jan Mayen", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan", "Province of China", "Tajikistan", "Tanzania", "United Republic of", "Thailand", "Timor-leste", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Viet Nam", "Virgin Islands", "British", "Virgin Islands", "U.S.", "Wallis and Futuna", "Western Sahara", "Yemen", "Zambia", "Zimbabwe"];
new Vue({
   el: "#root",
   data: {
      step: 1,
      max_steps: 5,
      countries: [],
      images: [
         {"title": "Head Shot",  "src": "http://via.placeholder.com/500x700"},
         {"title": "Head Shot",  "src": "http://via.placeholder.com/500x700"}
      ],
      ready: false,
      form: {
         email: "popsyjunior@gmail.com",
         first_name: "Popsana",
         last_name: "Barida",
         middle_name: "Noble",
         date_of_birth: null
      },
      filled: []
   },
   computed: {
      name: function() {
         return [this.form.first_name, this.form.middle_name, this.form.last_name].join(" ");
      }
   },
   mounted: function () {
      this.ready = true;
      this.countries = window.countries;
   },
   methods: {
      inStep: function (step) {
         return this.step === step;
      },
      navigate: function (direction) {         
         var add = -1;
         if (direction === "forward") {
            this.filled.push(this.step);
            add = 1;
         }

         var step = Math.floor(this.step);
         step += add;
         
         if (step <= 1) {
            step = 1;
         } else if (step >= this.max_steps) {
            step = this.max_steps;
         }
         
         this.step = step;
      },
      readURL: function (event, file_index) {
         var input = event.target;
         var ii = file_index - 1;

         if (input.files && input.files[0]) {
            var reader = new FileReader();
            var placeholder = this.$refs["image-chooser-" + file_index];
            console.log("placeholder: ", placeholder);

            reader.onload = function (e) {
               var img = this.images[ii].src;
               console.log("src: ", img);
               this.images[ii].src = e.target.result;
            }.bind(this);

            reader.readAsDataURL(input.files[0]);
         }
      },
      startPayment: function() {
         
      },
      payWithPaystack: function() {
         var handler = PaystackPop.setup({
            key: 'pk_live_f6812130fbccdaebe8f96c01101b86fced77d895',
            email: this.form.email,
            amount: 6000 * 100,
            ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            metadata: {
               custom_fields: [
                  {
                     display_name: this.full_name,
                     variable_name: "Full Name",
                     value: this.full_name
                  }
               ]
            },
            callback: function(response){
               swal("Payment successful",  response.reference, "success");
            },
            onClose: function(){
               swal("Payment Error",  "The payment was not successful", "error");
            }
         });

         handler.openIframe();
      },
      isFilled: function (step) {
         if( step === this.step ) {
            return true;
         } else {
            console.log(this.filled);
            return this.filled.indexOf(step) >= 0;
         }
      },
      validateDate: function() {
         console.log(this.form.date_of_birth);

         if( this.form.date_of_birth ) {            
            var fmt = this.form.date_of_birth.replace(/\-/g, "");
            console.log("fmt", fmt);
            var age = Math.floor(moment(fmt, "YYYYMMDD").fromNow().replace(/[a-zA-Z\s]+/, "").trim());
            console.log("Age: ", age);

            //Allow from 20-30
            if( age < 20 || age > 30 ) {
               this.form.valid_age = "no";
            } else {
               this.form.valid_age = "yes";
            }
         }
      }
   }
});