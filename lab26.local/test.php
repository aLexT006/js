<?php
session_start();

// Инициализация результатов при отправке формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Было: $_SERVER'REQUEST_METHOD'
    $score = 0;
    $results = [];
    
    // Вопрос 1
    if (isset($_POST['q1']) && $_POST['q1'] == 'i') {
        $score++;
        $results['q1'] = '✓';
    } else {
        $results['q1'] = '✗';
    }
    
    // Вопрос 2
    if (isset($_POST['q2']) && is_array($_POST['q2'])) {
        $q2_answers = $_POST['q2'];
        if (count($q2_answers) == 3 && 
            in_array('dot', $q2_answers) && 
            in_array('star', $q2_answers) && 
            in_array('plus', $q2_answers)) {
            $score++;
            $results['q2'] = '✓';
        } else {
            $results['q2'] = '✗';
        }
    } else {
        $results['q2'] = '✗';
    }
    
    // Вопрос 3
    if (isset($_POST['q3']) && $_POST['q3'] == 'd') {
        $score++;
        $results['q3'] = '✓';
    } else {
        $results['q3'] = '✗';
    }
    
    // Вопрос 4
    $emailRegex = '/^\w+([\.\w]+)*\w@\w((\.\w)*\w+)*\.\w{2,3}$/';
    $phoneRegex = '/\d{3}-\d{2}-\d{2}/';
    
    $email_valid = isset($_POST['email']) && preg_match($emailRegex, $_POST['email']);
    $phone_valid = isset($_POST['phone']) && preg_match($phoneRegex, $_POST['phone']);
    
    if ($email_valid && $phone_valid) {
        $score++;
        $results['q4'] = '✓';
    } else {
        $results['q4'] = '✗';
    }
    
    if (isset($_POST['drag_d1']) && isset($_POST['drag_d2']) && isset($_POST['drag_d3'])) {
        if ($_POST['drag_d1'] == 's1' && $_POST['drag_d2'] == 's2' && $_POST['drag_d3'] == 's3') {
            $score++;
            $results['q5'] = '✓';
        } else {
            $results['q5'] = '✗';
        }
    } else {
        $results['q5'] = '✗';
    }
    
    // Вычисление оценки
    $percent = ($score / 5) * 100;
    if ($percent >= 90) $grade = '5';
    else if ($percent >= 75) $grade = '4';
    else if ($percent >= 60) $grade = '3';
    else $grade = '2';
    
    // Сохраняем результаты в сессию
    $_SESSION['results'] = $results;
    $_SESSION['score'] = $score;
    $_SESSION['grade'] = $grade;
    $_SESSION['percent'] = $percent;
    
    // Сохраняем введенные данные для отображения
    $_SESSION['form_data'] = $_POST;
    
    // Перенаправляем на ту же страницу для предотвращения повторной отправки
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Получаем сохраненные результаты из сессии
$results = $_SESSION['results'] ?? null;
$score = $_SESSION['score'] ?? null;
$grade = $_SESSION['grade'] ?? null;
$percent = $_SESSION['percent'] ?? null;
$form_data = $_SESSION['form_data'] ?? null;

// Очищаем сессию после получения данных
if ($results) {
    unset($_SESSION['results']);
    unset($_SESSION['score']);
    unset($_SESSION['grade']);
    unset($_SESSION['percent']);
    unset($_SESSION['form_data']);
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Тестирование по регулярным выражениям (PHP)</title>
    <style>
        body {
            font-family: Arial;
            max-width: 800px;
            margin: 20px auto;
            background: #f0f0f0;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            color: #2196F3;
        }

        .block {
            background: #f9f9f9;
            padding: 15px;
            margin: 15px 0;
            border-left: 5px solid #2196F3;
            border-radius: 0 5px 5px 0;
        }

        button, .button {
            background: #2196F3;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }

        button:hover, .button:hover {
            background: #1976D2;
        }

        .green {
            color: green;
            font-weight: bold;
        }

        .red {
            color: red;
            font-weight: bold;
        }

        .drag-box {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .items {
            background: #e3f2fd;
            padding: 15px;
            flex: 1;
            min-width: 200px;
            border-radius: 5px;
        }

        .slots {
            background: #fff3e0;
            padding: 15px;
            flex: 1;
            min-width: 200px;
            border-radius: 5px;
        }

        .item {
            background: #2196F3;
            color: white;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            cursor: grab;
            text-align: center;
            transition: transform 0.2s;
        }

        .item:active {
            cursor: grabbing;
        }

        .slot {
            background: white;
            border: 2px dashed #ff9800;
            padding: 10px;
            margin: 5px 0;
            min-height: 40px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .slot.drag-over {
            background: #ffe0b2;
        }

        .result-block {
            background: #e8f5e9;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
            border-left: 5px solid #4CAF50;
        }

        .grade {
            font-size: 24px;
            text-align: center;
            padding: 15px;
            color: white;
            margin: 15px 0;
            border-radius: 5px;
            font-weight: bold;
        }

        code {
            background: #ddd;
            padding: 10px;
            display: block;
            margin: 10px 0;
            border-radius: 5px;
            font-family: monospace;
            word-break: break-all;
        }

        input[type="text"], select {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
            margin: 5px 0;
            box-sizing: border-box;
        }

        input[type="text"]:focus, select:focus {
            outline: none;
            border-color: #2196F3;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            margin: 10px 0;
        }

        .btn-group button {
            flex: 1;
        }

        .result-indicator {
            font-size: 20px;
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>📝 ТЕСТИРОВАНИЕ ПО РЕГУЛЯРНЫМ ВЫРАЖЕНИЯМ</h1>
        
        <form method="POST" action="" id="testForm">
           
            <div class="block">
                <h3>1. Флаг i в регулярных выражениях обозначает:</h3>
                <label>
                    <input type="radio" name="q1" value="g" <?php echo ($form_data['q1'] ?? '') == 'g' ? 'checked' : ''; ?>>
                    Глобальный поиск
                </label><br>
                <label>
                    <input type="radio" name="q1" value="i" <?php echo ($form_data['q1'] ?? '') == 'i' ? 'checked' : ''; ?>>
                    Регистронезависимость
                </label><br>
                <label>
                    <input type="radio" name="q1" value="m" <?php echo ($form_data['q1'] ?? '') == 'm' ? 'checked' : ''; ?>>
                    Многострочный режим
                </label>
                <?php if (isset($results['q1'])): ?>
                    <span class="result-indicator <?php echo $results['q1'] == '✓' ? 'green' : 'red'; ?>">
                        <?php echo $results['q1']; ?>
                    </span>
                <?php endif; ?>
            </div>

          
            <div class="block">
                <h3>2. Какие из перечисленных символов являются метасимволами в regex?</h3>
                <label>
                    <input type="checkbox" name="q2[]" value="dot" <?php echo isset($form_data['q2']) && in_array('dot', $form_data['q2']) ? 'checked' : ''; ?>>
                    . (точка)
                </label><br>
                <label>
                    <input type="checkbox" name="q2[]" value="star" <?php echo isset($form_data['q2']) && in_array('star', $form_data['q2']) ? 'checked' : ''; ?>>
                    * (звездочка)
                </label><br>
                <label>
                    <input type="checkbox" name="q2[]" value="plus" <?php echo isset($form_data['q2']) && in_array('plus', $form_data['q2']) ? 'checked' : ''; ?>>
                    + (плюс)
                </label><br>
                <label>
                    <input type="checkbox" name="q2[]" value="hash" <?php echo isset($form_data['q2']) && in_array('hash', $form_data['q2']) ? 'checked' : ''; ?>>
                    # (решетка)
                </label><br>
                <label>
                    <input type="checkbox" name="q2[]" value="at" <?php echo isset($form_data['q2']) && in_array('at', $form_data['q2']) ? 'checked' : ''; ?>>
                    @ (собака)
                </label>
                <?php if (isset($results['q2'])): ?>
                    <span class="result-indicator <?php echo $results['q2'] == '✓' ? 'green' : 'red'; ?>">
                        <?php echo $results['q2']; ?>
                    </span>
                <?php endif; ?>
            </div>


            <div class="block">
                <h3>3. Выберите регулярное выражение для поиска цифры:</h3>
                <select name="q3" id="q3">
                    <option value="">-- Выберите --</option>
                    <option value="d" <?php echo ($form_data['q3'] ?? '') == 'd' ? 'selected' : ''; ?>>\d</option>
                    <option value="w" <?php echo ($form_data['q3'] ?? '') == 'w' ? 'selected' : ''; ?>>\w</option>
                    <option value="s" <?php echo ($form_data['q3'] ?? '') == 's' ? 'selected' : ''; ?>>\s</option>
                </select>
                <?php if (isset($results['q3'])): ?>
                    <span class="result-indicator <?php echo $results['q3'] == '✓' ? 'green' : 'red'; ?>">
                        <?php echo $results['q3']; ?>
                    </span>
                <?php endif; ?>
            </div>

            <div class="block">
                <h3>4. Введите строки, соответствующие регулярным выражениям:</h3>
                <code>/^\w+([\.\w]+)*\w@\w((\.\w)*\w+)*\.\w{2,3}$/</code>
                <input type="text" name="email" id="email" 
                       value="<?php echo htmlspecialchars($form_data['email'] ?? ''); ?>">
                <button type="button" onclick="checkEmail()">Проверить email</button>
                <p id="resEmail"></p>

                <p><strong>Телефон:</strong></p>
                <code>/\d{3}-\d{2}-\d{2}/</code>
                <input type="text" name="phone" id="phone"  
                       value="<?php echo htmlspecialchars($form_data['phone'] ?? ''); ?>">
                <button type="button" onclick="checkPhone()">Проверить телефон</button>
                <p id="resPhone"></p>
                
                <?php if (isset($results['q4'])): ?>
                    <span class="result-indicator <?php echo $results['q4'] == '✓' ? 'green' : 'red'; ?>">
                        <?php echo $results['q4']; ?>
                    </span>
                <?php endif; ?>
            </div>
            <div class="block">
                <h3>5. Перетащите элементы в соответствующие ячейки:</h3>
                <div class="drag-box">
                    <div class="items" id="words">
                        <div class="item" draggable="true" ondragstart="drag(event)" id="d1" data-value="\d">\d</div>
                        <div class="item" draggable="true" ondragstart="drag(event)" id="d2" data-value="\w">\w</div>
                        <div class="item" draggable="true" ondragstart="drag(event)" id="d3" data-value="\s">\s</div>
                    </div>
                    <div class="slots" id="slots">
                        <div class="slot" ondrop="drop(event)" ondragover="allowDrop(event)" id="s1">Цифра</div>
                        <div class="slot" ondrop="drop(event)" ondragover="allowDrop(event)" id="s2">Буква</div>
                        <div class="slot" ondrop="drop(event)" ondragover="allowDrop(event)" id="s3">Пробел</div>
                    </div>
                </div>

                <input type="hidden" name="drag_d1" id="drag_d1" value="words">
                <input type="hidden" name="drag_d2" id="drag_d2" value="words">
                <input type="hidden" name="drag_d3" id="drag_d3" value="words">
                
                <?php if (isset($results['q5'])): ?>
                    <span class="result-indicator <?php echo $results['q5'] == '✓' ? 'green' : 'red'; ?>">
                        <?php echo $results['q5']; ?>
                    </span>
                <?php endif; ?>
            </div>

            <div class="btn-group">
                <button type="submit">✅ ПРОВЕРИТЬ ТЕСТ</button>
                <button type="button" onclick="resetDragDrop()">🔄 Сбросить Drag&Drop</button>
            </div>
        </form>

        <?php if ($results): ?>
        <div class="result-block">
            <h3>📊 Результаты тестирования:</h3>
            <?php foreach ($results as $question => $result): ?>
                <p class="<?php echo $result == '✓' ? 'green' : 'red'; ?>">
                    Вопрос <?php echo substr($question, 1); ?>: <?php echo $result; ?>
                </p>
            <?php endforeach; ?>
        </div>
        
        <div class="grade" style="background: <?php echo $percent >= 60 ? '#4CAF50' : '#f44336'; ?>">
            Оценка: <?php echo $grade; ?> (<?php echo $score; ?>/5 - <?php echo round($percent); ?>%)
        </div>
        <?php endif; ?>
    </div>

    <script>
        function checkEmail() {
            let regex = /^\w+([\.\w]+)*\w@\w((\.\w)*\w+)*\.\w{2,3}$/;
            let str = document.getElementById('email').value;
            let res = document.getElementById('resEmail');

            if (regex.test(str)) {
                res.innerHTML = '<span class="green">✓ Email корректный</span>';
            } else {
                res.innerHTML = '<span class="red">✗ Email не соответствует шаблону</span>';
            }
        }

        function checkPhone() {
            let regex = /\d{3}-\d{2}-\d{2}/;
            let str = document.getElementById('phone').value;
            let res = document.getElementById('resPhone');

            if (regex.test(str)) {
                res.innerHTML = '<span class="green">✓ Телефон корректный</span>';
            } else {
                res.innerHTML = '<span class="red">✗ Телефон не соответствует шаблону</span>';
            }
        }

        function allowDrop(e) { 
            e.preventDefault(); 
            e.target.classList.add('drag-over');
        }

        function drag(e) { 
            e.dataTransfer.setData("text", e.target.id);
        }

        function drop(e) {
            e.preventDefault();
            e.target.classList.remove('drag-over');
            
            let slot = e.target.closest('.slot');
            if (!slot) return;

            let id = e.dataTransfer.getData("text");
            let elem = document.getElementById(id);
            let old = slot.querySelector('.item');

            if (old) document.getElementById('words').appendChild(old);
            slot.appendChild(elem);
            updateHiddenFields();
        }

        
        function updateHiddenFields() {
            let d1 = document.getElementById('d1');
            let d2 = document.getElementById('d2');
            let d3 = document.getElementById('d3');
            
            document.getElementById('drag_d1').value = d1.parentElement.id;
            document.getElementById('drag_d2').value = d2.parentElement.id;
            document.getElementById('drag_d3').value = d3.parentElement.id;
        }

        function resetDragDrop() {
            let words = document.getElementById('words');
            let d1 = document.getElementById('d1');
            let d2 = document.getElementById('d2');
            let d3 = document.getElementById('d3');
            
            words.appendChild(d1);
            words.appendChild(d2);
            words.appendChild(d3);
            
            updateHiddenFields();
        }

        // Убираем подсветку при уходе с элемента
        document.addEventListener('dragleave', function(e) {
            if (e.target.classList) {
                e.target.classList.remove('drag-over');
            }
        });

     
        document.addEventListener('dblclick', function (e) {
            if (e.target.classList.contains('item') && e.target.parentElement.classList.contains('slot')) {
                document.getElementById('words').appendChild(e.target);
                updateHiddenFields();
            }
        });

        document.getElementById('testForm').addEventListener('submit', function() {
            updateHiddenFields();
        });

        window.onload = function() {
            updateHiddenFields();
            <?php if (isset($form_data['drag_d1'])): ?>
            let dragState = {
                d1: '<?php echo $form_data['drag_d1']; ?>',
                d2: '<?php echo $form_data['drag_d2']; ?>',
                d3: '<?php echo $form_data['drag_d3']; ?>'
            };
            
            for (let [itemId, slotId] of Object.entries(dragState)) {
                if (slotId !== 'words') {
                    let item = document.getElementById(itemId);
                    let slot = document.getElementById(slotId);
                    if (item && slot) {
                        slot.appendChild(item);
                    }
                }
            }
            <?php endif; ?>
        };
    </script>
</body>

</html>