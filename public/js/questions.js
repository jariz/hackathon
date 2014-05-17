(function ($) {
    var Questions = {
        theQuestions: undefined,
        init: function () {
            this.theQuestions = questions;

            //set title
            var question = Questions.getQuestion();
            $(".question>h1").text(question.phrase);

            //bind answers
            $(".question .answers .yes").click(this.yes);
            $(".question .answers .no").click(this.no);

        },
        qIndex: 0,
        newQuestion: function() {
            Questions.qIndex++;
            var question = Questions.getQuestion();
            if( !question){
                $('.question').animate({
                   height: 200
                }, 500);
                return false;
            }
            $(".question>h1").text(question.phrase);
            $(".question>h3,.question>h1,.question .answers").show();
        },
        yes: function () {
            Questions.nextQuestion(function() {
                Questions.processAnswer(true);
            });
            return false;
        },
        no: function () {
            Questions.nextQuestion(function() {
                Questions.processAnswer(false);
            });
            return false;
        },
        getQuestion: function() {
            console.log(typeof Questions.theQuestions[Questions.qIndex]);
            if( typeof Questions.theQuestions[Questions.qIndex] === 'undefined'){
                $(".question>h1").text("Here are the best matches we have found for you!");
                $(".question>h3,.question>h1").show();
                $('.question .answers').hide();
                return false;
            }
            return Questions.theQuestions[Questions.qIndex];
        },
        processAnswer: function(yes) {
            var question = Questions.getQuestion();

            if( !question )
                return false;

            if(yes && typeof question.answers.yes == "object") {
                Questions.exclude = $.extend(Questions.exclude, question.answers.yes);
            } else if(!yes && typeof question.answers.no == "object") {
                Questions.exclude = $.extend(Questions.exclude, question.answers.no);
            }

            if(Questions.exclude.length == 0) return;

            var klass = "";
            for(key in Questions.exclude){
                var current = Questions.exclude[key];
                klass += ",."+current;
            }
            if(klass.length > 0) klass = klass.substr(1, klass.length);;

            console.log("Je haat deze dingen:", Questions.exclude);

            $(".container").isotope({
                filter: ":not("+klass+")"
            });

            Questions.newQuestion();
        },
        nextQuestion: function(callback) {
            var alreadyCalled = false;
            $(".question>h3,.question>h1,.question .answers").fadeOut(500, function() {
                if(alreadyCalled) return;
                else alreadyCalled = true;

                var compliment = Questions.compliments[Math.floor(Math.random() * Questions.compliments.length)];
                $(".question").append("<h1 class='tada animated compliment'>"+compliment+"</h1>");
                setTimeout(function() {
                    $(".question>.compliment").remove();
                    callback();
                }, 500);
            });
        },
        exclude: [],
        compliments: [
            "Great!",
            "Super",
            "Awesome",
            "Alright then.",
            "Alright!",
            "OK"
        ]
    };

    Questions.init();
})(jQuery);