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
                Questions.exclude = $.extend(question.answers.yes, Questions.exclude);
            } else if(!yes && typeof question.answers.no == "object") {
                Questions.exclude = $.extend(question.answers.no, Questions.exclude);
            }

            if(Questions.exclude.length == 0) return;

            var klass = "";
            var query = "";
            for(key in Questions.exclude){
                var current = Questions.exclude[key];
                klass += ",."+current;
                query += ","+current;
            }
            if(klass.length > 0) klass = klass.substr(1, klass.length);
            if(query.length > 0) query = query.substr(1, query.length);

            console.log("Je haat deze dingen:", Questions.exclude);

            $(".container").isotope({
                filter: ":not("+klass+")"
            });

            console.log("Ik ga de server nu een vraagje stellen");
            $.getJSON("/count/excluded/"+query, {}, function(data) {
                $("#current").text(data.count);
            });

            Questions.newQuestion();
        },
        nextQuestion: function(callback) {
            var alreadyCalled = false;
            $(".question>h3,.question>h1").show().fadeOut("slow");
            $(".question .answers").show().fadeOut("slow", function() {
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