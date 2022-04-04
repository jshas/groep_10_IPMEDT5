@extends('baseview')
<section class="room__detailed">
    <p class="roomcard__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores omnis explicabo vitae facilis corporis quaerat, quia molestias quae ipsam alias? Aperiam magni expedita ex est soluta beatae sint a sapiente. </p>
    <button onClick="createGrid()">Detailed view</button>
    <form action="#" onsubmit="fillgrid();return false" class="grid__form">
    <input class="grid__input" id="grid-text" type="text">
    <input class="grid__input" type="submit">
    </form>

    <div class="room__grid">
    <!-- Divs met "grid__item" komen hier -->
    </div>

  

    </section>