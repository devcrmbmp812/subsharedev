.modal {
        display: block;
        visibility: hidden;
        height: 0px;
        width: 0px;
    }
    .modal-open .modal{
        visibility: visible;
        height: auto;
        width: auto;
           padding-top: 116px;

    }
        li.player-adv-btn button {
        border: 0px;
        background: no-repeat;
    }

    /* Regions */
    .wavesurfer-region {
      border: 1px solid #ddd !important;
      box-sizing: border-box;
    }

    /* Region handles */
    .wavesurfer-handle {
      width: 10px !important;
      max-width: 10px !important;
      border: 1px solid #ddd;
      background: rgba(0, 0, 0, 0.1);
      box-sizing: border-box;
    }


    .wavesurfer-handle:before,
    .wavesurfer-handle:after {
      content: '';
      display: block;
      position: absolute;
      z-index: 1;
      border-top: 1px solid #fff;
      border-bottom: 1px solid #fff;
      height: 4px;
      left: 5%;
      right: 5%;
      top: 50%;
      transform: translateY(-50%);
    }

    .wavesurfer-handle:before {
      margin-top: -3px;
    }

    /* Labels */
    .labels-container {
      position: relative;
    }
    .wavesurfer-region{
        opacity: 0.3!important;
    }
    .wavesurfer-label {
      display: block;
      position: absolute;
      transform: translateY(-100%);
      z-index: 10;

    }

    .wavesurfer-label input {
      margin: 3%;
      width: 94%;
    }
    .album-buttom2 .album-buttoms{
        border-radius: 14px;
        background-color: #e72b91;
        position: relative;
        width: 111px;
        height: 29px;
        z-index: 483;
        font-size: 14px;
        font-weight: bold;
        color: #fff;
        border: none;
        margin-top: 9px;
        margin-bottom: 10px;
        margin-left: 40px;
    }
    .album-buttom3 .album-buttoms{
            border-radius: 14px;
        background-color: #3ecdd2;
        position: relative;
        width: 111px;
        height: 29px;
        z-index: 483;
        font-size: 14px;
        font-weight: bold;
        color: #fff;
        border: none;
        margin-top: 9px;
        margin-bottom: 10px;
        margin-left: 40px;
    }
    .album-buttom1 .album-buttoms {
        border-radius: 14px;
        background-color: #91c21d;
        position: relative;
        width: 111px;
        height: 29px;
        z-index: 483;
        font-size: 14px;
        font-weight: bold;
        color: #fff;
        border: none;
        margin-top: 9px;
        margin-bottom: 10px;
        margin-left: 0px;
    }
    .labels-container {
        position: relative;
        margin: 70px 0px;
    }
    .btn-primary:active,
    .btn-primary:hover,
    .btn-primary,
    .btn-primary:active:focus{
        color: #fff!important;
        background-color: #fff!important;
        border-color: #fff!important;
        box-shadow: inset 0 0px 0px rgba(0,0,0,0)!important;
    }
    .active-module{
            display: block!important;
        visibility: visible!important;
    }
    .songplay.adv-player,
    .notification-popup{
            visibility: hidden;
        height: 0px;
        width: 0px;
    }
    .songplay.adv-player.active-link,
    .notification-popup.active-link{
            visibility: visible;
        height: auto;
        width: auto;
    }
    .songplay.adv-player .modal-down-area {
        background: #eff3f5;
        padding: 54px 0px 0px;
    }
    .progress-bar ,
    ul.player-icon-right li.active img:nth-child(1),
    ul.player-icon-right li img:nth-child(2),
    .player-icon-left li.active img:first-child,
    .player-icon-left li img:last-child{
        display:none;
    }
    ul.player-icon-right li.active img:nth-child(2),
    .player-icon-left li.active img:last-child{
                display: inline-block;
    }
    ul.player-icon-left li {

        vertical-align: middle;
    }

    /*view details link css */
   #last-table-area {
          font-family: 'Raleway', sans-serif;
        font-size: 14px;
        font-weight: bold;
        color: #8fa1ae;
    }
    .my_btn{
        background: #3ee38c;
    color: #fff;
    font-size: 16px;
    padding: 13px;
    border-radius: 25px;
    border: 0px;
    }