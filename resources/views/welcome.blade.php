<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>fullpage Testaufgabe</title>
  {{-- fullpage CSS --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/4.0.22/fullpage.css"
    integrity="sha512-AIwt5sjXSKDo4t0KSQ/eAuy43kQMc1hYtIKLxaFrHd26nQFzMo1FJdBIickVyGXnhm2xB2OOYBqMBgu3dBU4KA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  {{-- JQuery --}}
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  {{-- fullpage extensions --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/4.0.22/fullpage.extensions.min.js"
    integrity="sha512-fOlK0nmiY4Q7hrlnFMgmEiXBzCaDtIWFLCjPNwb5YN0PqcpburbfkSJ2UL+rcfdslRbNlDeml6t1Se9WLmRKjw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  {{-- bootstrap CSS --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  {{-- font awsome 6.5.1 --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  {{-- custom CSS --}}
  <link rel="stylesheet" href="{{ asset('fullpage/css.css') }}">

</head>

<body>
  <div id="fullpage">
    {{-- first section ( welcome ) --}}
    <div class="text-white section active border border-warning" style="background: #ff5f45">
      <h1 class="text-center" style="font-size: 160px;">Fragebogen</h1>
      <div class="down-arrow text-center">
        <h1 id="go-to-question-1" style="font-size: 50px;cursor: pointer;">
          <i class="fa-solid fa-angles-down"></i>
        </h1>
      </div>
    </div>

    {{-- second section ( questions ) --}}
    <div class="section bg-info text-white" data-anchor="question-1">
      @foreach($questions as $question)

      @switch($question['questions']['type'][0])
      @case("radio")
      <div class="slide" data-anchor="slide{{ $loop->index }}">
        <h1 class="text-center">{{ $question['questions']['question'] }}
        </h1>
        <ul class="w-50 m-auto mt-5">
          @foreach($question['questions']['options'] as $option)
          <li>{{ $option }}</li>
          @endforeach
        </ul>
        <div class="w-50 m-auto mt-5 d-grid gap-2">
          @foreach($question['questions']['answers'] as $answer)
          <input type="radio" class="btn-check" name="{{ $question->id }} {{ $answer['option'] }}"
            onclick="{{ $answer['proceed'] == 1 ? 'nextQuestion()' : 'cancellation()' }}"
            id="{{ $question->id }} {{ $answer['option'] }}">
          <label class="btn text-dark btn-outline-primary" for="{{ $question->id }} {{ $answer['option'] }}">{{
            $answer["option"] }}</label>
          @endforeach
        </div>
      </div>
      @break

      @case("checkbox")
      <div class="slide" data-anchor="slide{{ $loop->index }}">
        <h1 class="text-center">{{ $question['questions']['question'] }}
        </h1>
        <ul class="w-50 m-auto mt-5 list-group list-group-horizontal">
          @foreach($question['questions']['answers'] as $answer)
          <li class="list-group-item bg-transparent border border-0">
            <input type="checkbox" class="btn-check"
              name="{{ $question->id }} {{ $answer['option'] }} {{ $answer['proceed'] }}"
              id="{{ $question->id }} {{ $answer['option'] }} {{ $answer['proceed'] }}">
            <label class="btn text-dark btn-outline-primary"
              for="{{ $question->id }} {{ $answer['option'] }} {{ $answer['proceed'] }}">{{
              $answer["option"] }}</label>
          </li>
          @endforeach
        </ul>
        <div class="w-50 m-auto mt-5 d-grid gap-2">
          <input type="radio" class="btn-check" name="submit" id="submit">
          <label class="btn btn-success" for="submit">Weider</label>
        </div>
      </div>

      <script>
        $("#submit").click(function () {
          var lastCharacters = []; // Initialize an empty array to store the last characters
          var checkboxesChecked = $("input[type='checkbox']:checked");
          // Check if no checkboxes are checked
          if (checkboxesChecked.length <= 1) {
              // If none are checked, nothing happens
              return;
          }
          // Loop through each checkbox
          checkboxesChecked.each(function() {
              // Get the name attribute of the current checkbox
              var checkboxName = $(this).attr("name");
              // Get the last character of the name attribute
              var lastCharacter = checkboxName.charAt(checkboxName.length - 1);
              // Push the last character into the array
              lastCharacters.push(lastCharacter);
          });
          // Check if the array contains exactly two occurrences of 0
          if (lastCharacters.length === 2 && lastCharacters.every(character => character === '0')) {
              // Call the cancellation function
              cancellation();
          } else {
              nextQuestion();
          }
        });
      </script>
      @break
      @case("text")
      <div class="slide" data-anchor="slide{{ $loop->index }}">
        <div class="w-50 m-auto mt-5 d-grid gap-2">
          <div class="form-floating">
            <textarea class="form-control" placeholder="{{ $question['questions']['question'] }}"
              id="{{ $question->id }} {{ $answer['option'] }}" style="height: 100px"></textarea>
            <label for="{{ $question->id }} {{ $answer['option'] }}" class="text-dark">{{
              $question['questions']['question'] }}</label>
          </div>
        </div>
      </div>
      @break
      @endswitch

      @endforeach
    </div>

    {{-- third section ( cancel OR confirm ) --}}
    <div class="text-white section bg-danger border border-warning" data-anchor="cancellation">
      <h1 class="text-center"><i class="fa-solid fa-face-sad-tear"></i></h1>
      <h1 class="text-center" style="font-size: 160px;">Cancellation</h1>
    </div>
  </div>

  {{-- bootstrap JS --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
  {{-- Custom JS --}}
  <script src="{{ asset('fullpage/js.js') }}"></script>

</body>

</html>