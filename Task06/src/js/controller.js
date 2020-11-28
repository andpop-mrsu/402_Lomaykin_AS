import {
    startGame,
    informationOutput,
    showGameOutput
} from './view.js';

import {
    btn_nextInfo,
    btn_nextShowGame,
    btn_checkLetter,
    btn_replayGame,
    checkLetter
} from "./model.js";


startGame();

btn_nextInfo.addEventListener("click", informationOutput);
btn_nextShowGame.addEventListener("click", showGameOutput);
btn_checkLetter.addEventListener("click", checkLetter);
btn_replayGame.addEventListener("click", showGameOutput);