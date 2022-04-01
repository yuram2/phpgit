<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OX 퀴즈</title>
     <!-- style -->
<?php
        include "../include/style.php"
    ?>
    <!-- style -->
</head>
<body class="oxbody">
<?php
        include "../include/header.php";
    ?>
    <!-- //header -->

    <div class="grid">
   <h1>재미있고 신나는<span> OX 퀴즈<span></h1>
   <!-- // 제목 -->

   <div id="quiz">
      <p id="question"></p>
      <!-- // 문제 -->

      <div class="buttons">
         <button class="btn"></button>
         <button class="btn"></button>
      </div>
      <!-- // 정답선택버튼 -->

      <footer>
         <p id="progress"></p>
      </footer>
      <!-- // 진행상황 -->
   </div>
</div>



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
   new Question('1부터 7까지 곱한 숫자가 1부터 100까지 더한 숫자보다 높다', ['O', 'X'], 'X'),
   new Question('머리를 자주 감으면 머리카락이 빠진다.', ['O', 'X'], 'X'),
   new Question('남극에도 우편번호가 있다.', ['O', 'X'], 'X'),
   new Question('빵은 순수한 우리말이다.', ['O', 'X'], 'O'),
   new Question('파란 전등 밑에서 빨강 종이를 보면 보라색으로 보인다.', ['O', 'X'], 'X'),
   new Question('남자와 여자의 목소리 중 멀리 들리는 것은 여자 목소리다.', ['O', 'X'], 'O'),
   new Question('시내버스 경로석은 6석 이상이 되어야 한다.', ['O', 'X'], 'O'),
   new Question('남극을 갈 때도 비자가 필요하다.', ['O', 'X'], 'X'),
   new Question('인간의 뇌 세포는 재생이 안 되는 신체세포이다.', ['O', 'X'], 'O'),
   new Question('물고기도 기침을 한다.', ['O', 'X'], 'O')
];

// 퀴즈 객체 생성
let quiz = new Quiz(questions);

// 문제 출력 함수
function updateQuiz() {
   let question = document.getElementById('question');
   let idx = quiz.questionIndex + 1;
   let choice = document.querySelectorAll('.btn');

   // 문제 출력
   question.innerHTML = '문제' + idx + ') ' + quiz.questions[quiz.questionIndex].text;

   // 선택 출력
   for (let i = 0; i < 2; i++) {
      choice[i].innerHTML = quiz.questions[quiz.questionIndex].choice[i];
   }

   progress();
}

function progress() {
   let progress = document.getElementById('progress');
   progress.innerHTML = '문제 ' + (quiz.questionIndex + 1) + '/ ' + quiz.questions.length;
}

let btn = document.querySelectorAll('.btn');

// 입력 및 정답 확인 함수
function checkAnswer(i) {
   btn[i].addEventListener('click', function() {
      let answer = btn[i].innerText;

      if (quiz.correctAnswer(answer)) {
        Swal.fire({
            icon: 'success',
            title: '정답입니다!',
            });
         quiz.score++;
      } else {
        Swal.fire({
            icon: 'error',
            title: '틀렸습니다'
            });
      }

      if (quiz.questionIndex < quiz.questions.length - 1) {
         quiz.questionIndex++;
         updateQuiz();
      } else {
         result();
      }
   });
}

function result() {
   let quizDiv = document.getElementById('quiz');
   let per = parseInt((quiz.score * 100) / quiz.questions.length);
   let txt = '<h1>결과</h1>' + '<h2 id="score">당신의 점수: ' + quiz.score + '/' + quiz.questions.length + '<br><br>' + per + '점' + '</h2>';

   quizDiv.innerHTML = txt;

   // 점수별 결과 텍스트
   if (per < 50) {
      txt += '<h2>더 분발하세요</h2>';
      quizDiv.innerHTML = txt;
   } else if (per >= 50 && per < 71) {
      txt += '<h2>무난한 점수네요</h2>'
      quizDiv.innerHTML = txt;
   } else if (per >= 80 && per < 99) {
      txt += '<h2>훌륭합니다</h2>'
      quizDiv.innerHTML = txt;
   } else if (per = 100) {
      txt += '<h2>대단해요!</h2>'
      quizDiv.innerHTML = txt;
   }
}

for (let i = 0; i < btn.length; i++) {
   checkAnswer(i);
}

updateQuiz();

    </script>
    
</body>
</html>

