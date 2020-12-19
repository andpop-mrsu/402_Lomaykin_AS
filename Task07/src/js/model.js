import {
    messageOutput,
    hangman,
    userName
} from "./View.js";

export let
    playerInit = document.getElementById("playerInit"),
    gameList = document.getElementById("gameList"),
    gameInfoText = document.getElementById("gameInfoText"),
    showGame = document.getElementById("showGame"),
    gameMessage = document.getElementById("gameMessage"),
    gameResult = document.getElementById("gameResult"),
    canvas = document.getElementById("canvas"),
    resultText = document.getElementById("resultText"),
    nextInfo = document.getElementById("nextInfo"),
    nextShowGame = document.getElementById("nextShowGame"),
    checkLetterBtn = document.getElementById("checkLetterBtn"),
    playAgainBtn = document.getElementById("playAgainBtn"),
    nameField = document.getElementById("nameField"),
    letterField = document.getElementById("letterField"),
    infoBlock = document.getElementById("infoBlock"),
    table = document.getElementById("table"),
    replayBtn = document.getElementById("replayBtn"),
    listGames = document.getElementById("listGames"),
    gameTableTitle = document.getElementById("gameTableTitle"),
    progress,
    remainingLetters,
    attempts,
    hidden_word,
    openLetters,
    words = ["Аналог", "Музыка", "Печать", "Балкон", "Клиент", "Ацетон", "Аспект", "Атеизм"];

let getLetter;
let attempt = 0;
let db = startDb();

String.prototype.replaceAt=function(index, replacement) {
  return this.substr(0, index) + replacement+ this.substr(index + replacement.length);
}


export function checkLetter() {
    if (letterField.value === "" || letterField.value.length > 1) {
        alert("Введите одну букву!");
    } else{
        attempt++;
        let tempCount = 0;
        getLetter = letterField.value;
        for (let i = 0; i < remainingLetters.length; i++) {
            if (remainingLetters[i] === getLetter.toUpperCase()) {
                progress = progress.replaceAt(i + 1, getLetter.toUpperCase())
                remainingLetters = remainingLetters.replaceAt(i, " ");
                tempCount = tempCount + 1;
                openLetters = openLetters + 1;
            }

        }

        if(tempCount === 0){
            attempts -= 1;
            addStepDb(attempt, getLetter, false)
        }else
        {
            addStepDb(attempt, getLetter, true)
        }

        hangman(attempts, progress);

        if(attempts === 0){
            updateDbStatus("Поражение")
        }

        letterField.value = "";
        if(openLetters === remainingLetters.length){
            updateDbStatus("Победа")
            messageOutput("win");
        }
    }
}

export function makeWord() {
    attempt = 0;
    hidden_word = words[Math.floor(Math.random() * words.length)].toUpperCase();
    progress = hidden_word[0] + "____" + hidden_word[5];
    remainingLetters = hidden_word[1] + hidden_word[2] + hidden_word[3] + hidden_word[4];
    attempts = 6;
    openLetters = 0;
    startGameDb();
    hangman(6, progress);
}

export async function startDb(){
    db =  await idb.openDB('gamesdb', 1, { upgrade(db) {
        db.createObjectStore('games', {keyPath: 'id', autoIncrement: true});
        db.createObjectStore('attempts', {keyPath: 'id', autoIncrement: true});
        },
        });
}


export async function startGameDb(){

    db =  await idb.openDB('gamesdb', 1, { upgrade(db) {
        db.createObjectStore('games', {keyPath: 'id', autoIncrement: true});
        db.createObjectStore('attempts', {keyPath: 'id', autoIncrement: true});
        },
        });

    await db.add('games', {
        date: new Date(),
        name: userName,
        playWord: hidden_word,
        result: "Игра не завершена"
        });
}

export async function addStepDb(attempt, letter, result){
    let idGame = await db.getAll('games');
    await db.add('attempts', {
        idGame: idGame.length,
        attempt,
        letter,
        result
        });
}

export async function updateDbStatus(result){

    let idGame = await db.getAll('games');
    let cursor = await db.transaction('games', 'readwrite').store.openCursor();

    while (cursor) {
        if (cursor.value.id === idGame.length) {
            let updateData = cursor.value;
            updateData.result = result;
            cursor.update(updateData);
        }

        cursor = await cursor.continue();
    }
}


export async function listGamesDb(){
    let games = await db.getAll('games');
    let render = '<tr>' +
        '<th>id</th>' +
        '<th>Имя</th>' +
        '<th>Слово</th>' +
        '<th>Результат</th>' +
        '<th>Дата</th>' +
        '</tr>';

    if(games.length > 0){
        for(let i = 0; i < games.length; i++){
            render += '<tr>' +
                '<th>' + games[i]["id"] + '</th>' +
                '<th>' + games[i]["name"] + '</th>' +
                '<th>' + games[i]["playWord"] + '</th>' +
                '<th>' + games[i]["result"] + '</th>' +
                '<th>' + games[i]["date"] + '</th>' +
                '</tr>';
        }

        return render;
    }
    else{
        return "<tr><th>Пока что нет записанных игр</th></tr>";
    }
}


export async function replayGameDb(){
    let idGame = prompt("Введите id игры:")
    let cursor = await db.transaction('attempts', 'readwrite').store.openCursor();

    let render = '<tr>' +
        '<th>Попытка</th>' +
        '<th>Буква</th>' +
        '<th>Результат</th>' +
        '</tr>';

    let countAttempts = 0;

    while (cursor) {
        if (cursor.value.idGame == idGame) {
            let data = cursor.value;
            render += '<tr>' +
                '<th>' + data.attempt + '</th>' +
                '<th>' + data.letter + '</th>' +
                '<th>' + data.result + '</th>' +
                '</tr>';
            countAttempts++;
        }

        cursor = await cursor.continue();
    }

    if(countAttempts == 0){
        return "Не было сделано шагов";
    }
    else{
        return render;
    }
}