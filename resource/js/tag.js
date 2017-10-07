/**
 * Created by 15185 on 2017/7/31.
 */
'use strict';

var switchButton 			= document.querySelector('.switch-button');
var switchBtnRight 			= document.querySelector('.switch-button-case.right');
var switchBtnLeft 			= document.querySelector('.switch-button-case.left');
var activeSwitch 			= document.querySelector('.active');

function switchLeft(){
    switchBtnRight.classList.remove('active-case');
    switchBtnLeft.classList.add('active-case');
    activeSwitch.style.left = '0%';
}

function switchRight(){
    switchBtnRight.classList.add('active-case');
    switchBtnLeft.classList.remove('active-case');
    activeSwitch.style.left = '50%';
}

switchBtnLeft.addEventListener('click', function(){
    switchLeft();
    document.getElementById('public').style['display'] = 'none';
    document.getElementById('private').style['display'] = 'inline-block';
}, false);

switchBtnRight.addEventListener('click', function(){
    switchRight();
    document.getElementById('public').style.display = 'inline-block';
    document.getElementById('private').style.display = 'none';
}, false);

