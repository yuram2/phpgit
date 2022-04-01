<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>상식 퀴즈</title>
    <!-- style -->
    <?php
        include "../include/style.php"
    ?>
    <!-- style -->
</head>
<body class="ss_body">
<?php
        include "../include/header.php";
    ?>
    <!-- //header -->

    <div class="wrap">
        <h1>재미있는<span> 상식 퀴즈<span></h1>
            <a id="ss_resetbtn">다시하기</a>
   <!-- // 제목 -->

   <div id="game">
      <p id="desc"></p>
      <!-- // 문제 -->

      <div class="ss_buttons">
         <button class="ss_btn"></button>
         <button class="ss_btn"></button>
         <button class="ss_btn"></button>
         <button class="ss_btn"></button>
      </div>
      <!-- // 정답선택버튼 -->

      <footer>
         <p id="ss_progress"></p>
      </footer>
      <!-- // 진행상황 -->
   </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
// 문제 객체(생성자 함수)
function Question(text, choice, answer) {
   this.text = text; // 질문 텍스트
   this.choice = choice; // 선택할 답들(배열)
   this.answer = answer; // 정답 정보
}

// 퀴즈 정보 객체
function Quiz(questions) {
   this.score = 0; // 점수
   this.questions = questions; // 문제
   this.questionIndex = 0; // 문제 번호
}

// 정답 확인 맞춰보는 메서드
Quiz.prototype.correctAnswer = function(answer) {
   return answer == this.questions[this.questionIndex].answer;
}

let questions = [
   new Question('우리나라 최남단에 있는 섬은?', ['백령도', '마라도', '우도', '제주도'], '마라도'),
   new Question('의학적으로 얼굴과 머리를 구분하는 기준은 어디일까요?', ['코', '눈썹', '귀', '머리카락'], '눈썹'),
   new Question('낙타의 혹 속에는 무엇이 들어있을까요?', ['지방', '물', '공기', '모래'], '지방'),
   new Question('흔히 성가신 일이 있을때 말하는 골치가 아프다의 골치는 어디를 가리킬까요?', ['어금니', '척추', '뇌', '엉덩이'], '뇌'),
   new Question('손가락마다 손톱이 자라는 속도는 모두 다르다고한다. 다음중 가장 빨리 자라는 손톱은?', ['중지', '검지', '엄지', '약지'], '중지'),
   new Question('다음 중 백합과에 속하는 채소가 아닌 것은?', ['양파', '무', '마늘', '파'], '무'),
   new Question('울릉도는 행정구역상 어디에 속할까요?', ['강원도', '경상북도', '제주도', '전라남도'], '경상북도'),
   new Question('겨울잠을 자는 동물이 아닌 것은?', ['곰', '뱀', '토끼', '고슴도치'], '토끼'),
   new Question('여름철 별자리가 아닌것은?', ['전갈자리', '거문고자리', '오리온자리', '궁수자리'], '오리온자리'),
   new Question('우리나라가 최초로 금메달을 획득한 종목은?', ['수영', '레슬링', '양궁', '유도'], '레슬링'),
];

// 퀴즈 객체 생성
let quiz = new Quiz(questions);

// 문제 출력 함수
function updateQuiz() {
   let question = document.getElementById('desc');
   let idx = quiz.questionIndex + 1;
   let choice = document.querySelectorAll('.ss_btn');

   // 문제 출력
   question.innerHTML = '문제' + idx + ' : ' + quiz.questions[quiz.questionIndex].text;

   // 선택 출력
   for (let i = 0; i < 4; i++) {
      choice[i].innerHTML = quiz.questions[quiz.questionIndex].choice[i];
   }

   progress();
}

function progress() {
   let progress = document.getElementById('ss_progress');
   progress.innerHTML = '문제 ' + (quiz.questionIndex + 1) + '/ ' + quiz.questions.length;
}

let btn = document.querySelectorAll('.ss_btn');

// 입력 및 정답 확인 함수
function checkAnswer(i) {
   btn[i].addEventListener('click', function() {
      let answer = btn[i].innerText;
      if (quiz.correctAnswer(answer)) {
        Swal.fire({
            icon: 'success',
            title: '정답입니다!',
            }).then(
                function (){
                if (quiz.questionIndex < quiz.questions.length - 1) {
                    quiz.questionIndex++;
                    updateQuiz();
                } else {
                    result();
                }                
                textspan();
                textcolor();
                }
            );
         quiz.score++;
      } else {
        Swal.fire({
            icon: 'error',
            title: '틀렸습니다'
            }).then(
                function (){
                if (quiz.questionIndex < quiz.questions.length - 1) {
                    quiz.questionIndex++;
                    updateQuiz();
                } else {
                    result();
                }                
                textspan();
                textcolor();
                }
            );
      }
   });
}


function result() {
   let quizDiv = document.getElementById('game');
   let per = parseInt((quiz.score * 100) / quiz.questions.length);
   let txt = '<h1 class="ss_result">결과</h1>' + '<h2 id="ss_score">당신의 점수: ' + quiz.score + '/' + quiz.questions.length + '<br><br>' + per + '점' + '</h2>';

   quizDiv.innerHTML = txt;

   // 점수별 결과 텍스트
   if (per < 50) {
      txt += '<h2 class="ss_v">더 분발하세요</h2>';
      quizDiv.innerHTML = txt;
   } else if (per >= 50 && per < 71) {
      txt += '<h2 class="ss_v">무난한 점수네요</h2>'
      quizDiv.innerHTML = txt;
   } else if (per >= 80 && per < 99) {
      txt += '<h2 class="ss_v">훌륭합니다</h2>'
      quizDiv.innerHTML = txt;
   } else if (per = 100) {
      txt += '<h2 class="ss_v">대단해요!</h2>'
      quizDiv.innerHTML = txt;
   }   
   $(function(){
       $("#ss_resetbtn").css({
           "opacity":"1",
           "visibility": "visible",
           "margin-top": "30px"
       });
   });
   Swal.fire({
    title: '이용해주셔서 감사합니다!',
    text: '문제는 꾸준히 업데이트 하겠습니다.',
    imageUrl: '../assets/img/quiz/ssquiz_alert2.gif',
    imageWidth: 400,
    imageHeight: 285,
    imageAlt: 'Custom image'    
   });
};



for (let i = 0; i < btn.length; i++) {
   checkAnswer(i);
}

updateQuiz();

//문제 글자들을 한글자씩 분리해서 span 태그 입히기
function textspan(){
    document.querySelectorAll("#desc").forEach(desc => {
    let splitText = desc.innerText;
    let splitWrap = splitText.split('').join("</span><span>");
        splitWrap = "<span>" + splitWrap + "</span>";
        desc.innerHTML = splitWrap                
    });
};
textspan();

function textcolor(){
//문제 한글자씩마다 마우스올려놓으면 색깔 무작위로 변경됨
$("#desc span:first-child").mouseover(function(){ // 마우스를 올려놓으면 실행            
    let colors = new Array('#3498db', '#e74c3c', '#2ecc71', '#e67e22', '#1abc9c', '#f1c40f');
        ranNum = Math.floor(Math.random() * 6)             
        $("#desc span:first-child").css("color", colors[ranNum]); // 배경색을 변경
});        
for(let i=2; i<100; i++){
    $("#desc span:nth-child("+i+")").mouseover(function(){ // 마우스를 올려놓으면 실행            
    let colors = new Array('#3498db', '#e74c3c', '#2ecc71', '#e67e22', '#1abc9c', '#f1c40f');
        ranNum = Math.floor(Math.random() * 6)             
        $("#desc span:nth-child("+i+")").css("color", colors[ranNum]); // 배경색을 변경
    });
};
//페이지가 로드되면 자동으로 문제의 글씨색갈들을 무작위로 변경함
$("#desc span:first-child").ready(function(){       
    let colors = new Array('#3498db', '#e74c3c', '#2ecc71', '#e67e22', '#1abc9c', '#f1c40f');
        ranNum = Math.floor(Math.random() * 6)             
        $("#desc span:first-child").css("color", colors[ranNum]); 
});
for(let i=2; i<100; i++){
    $("#desc span:nth-child("+i+")").ready(function(){          
    let colors = new Array('#3498db', '#e74c3c', '#2ecc71', '#e67e22', '#1abc9c', '#f1c40f');
        ranNum = Math.floor(Math.random() * 6)             
        $("#desc span:nth-child("+i+")").css("color", colors[ranNum]); 
    });
};
};
textcolor();

$("#ss_resetbtn").click(function(){
    location.reload(true);
});   

let timerInterval
Swal.fire({
  title: '문제를 불러오고 있습니다!',
  html: '<b></b> 후에 자동으로 닫힙니다.',
  timer: 2000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    const b = Swal.getHtmlContainer().querySelector('b')
    timerInterval = setInterval(() => {
      b.textContent = Swal.getTimerLeft()
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
})
//let randomnum = 0;
//$("#game").mouseover(function(){ // 마우스를 올려놓으면 실행
//    let interval = setInterval(function(){ // 일정시간마다 반복 실행    
//        randomnum = Math.random() * 0xffffff; // 랜덤하게 16진수 뽑기
//        randomnum = parseInt(randomnum); // 정수로 변환
//        randomnum = randomnum.toString(16);
//        $("#game").css("color","#"+randomnum); // 배경색을 변경
//    },50); // 0.05초마다 실행 (100 = 0.1초, 1000 = 1초)
//    $("#game").mouseout(function(){ // #color영역에서 마우스가 나갈시 실행
//        clearInterval(interval); // setInterval에서 지정한 작업을 중지
//    });
//});
      



</script>
    
</body>
</html>