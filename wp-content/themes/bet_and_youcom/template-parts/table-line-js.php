<script>
fetch('https://myscoreapi.herokuapp.com/betandyou')
  .then(data => data.json())
  .then(data => createRowLine(data.results))

const createRowLine = (arr) => {
  let content = ''
  arr.map((row, i) => {
    if (i < 25 || i >= 30) return

    content += `
    <div class="table__row">
      <div class="info">
        <div class="table__cell mobile">
          <span class="trim bold">${row.category}</span>
        </div>
        <div class="table__cell players">
          <span class="trim name">${row.player1}</span>
          <span class="sep mobile"> - </span>
          <span class="trim name">${row.player2}</span>
        </div>
      </div>
      <div class="values">
        <div class="table__cell number">
          <div class="table__col">
            <span class="number__head mobile">1</span>
            <span class="number__val">${row.col1[0] ? row.col1[0] : '-'}</span>
          </div>
          <div class="table__col">
            <span class="number__head mobile">x</span>
            <span class="number__val">${row.col1[1] ? row.col1[1] : '-'}</span>
          </div>
          <div class="table__col">
            <span class="number__head mobile">2</span>
            <span class="number__val">${row.col1[2] ? row.col1[2] : '-'}</span>
          </div>
        </div>
        <div class="table__cell number">
          <div class="table__col">
            <span class="number__head mobile">1x</span>
            <span class="number__val">${row.col2[0] ? row.col2[0] : '-'}</span>
          </div>
          <div class="table__col">
            <span class="number__head mobile">12</span>
            <span class="number__val">${row.col2[1] ? row.col2[1] : '-'}</span>
          </div>
          <div class="table__col">
            <div class="number__head mobile">2x</div>
            <span class="number__val">${row.col2[2] ? row.col2[2] : '-'}</span>
          </div>
        </div>
        <div class="table__cell number">
          <div class="table__col">
            <span class="number__head mobile">ABAIXO</span>
            <span class="number__val">${row.col3[0] ? row.col3[0] : '-'}</span>
          </div>
          <div class="table__col">
            <span class="number__head mobile">TOTAL</span>
            <span class="number__val">${row.col3[1] ? row.col3[1] : '-'}</span>
          </div>
          <div class="table__col">
            <span class="number__head mobile">ACIMA</span>
            <span class="number__val">${row.col3[2] ? row.col3[2] : '-'}</span>
          </div>
        </div>
      </div>
    </div>
    `
  })

  document.querySelector('.table__spinner').remove()
  document.querySelector('.table__body.line').insertAdjacentHTML('afterbegin', content);
}
</script>

<div class="table" data-link="Z28tYmV0">
  <div class="table__header desktop">
    <div class="table__row">
      <div class="table__cell">
        <span class="trim">LINE</span>
      </div>
      <div class="table__cell small">
        <div class="table__col">1</div>
        <div class="table__col">x</div>
        <div class="table__col">2</div>
      </div>
      <div class="table__cell small">
        <div class="table__col">1x</div>
        <div class="table__col">12</div>
        <div class="table__col">2x</div>
      </div>
      <div class="table__cell small">
        <div class="table__col">
          <span class="trim">ABAIXO</span>
        </div>
        <div class="table__col">
          <span class="trim">TOTAL</span>
        </div>
        <div class="table__col">
          <span class="trim">ACIMA</span>
        </div>
      </div>
    </div>
  </div>
  <div class="table__body line">
    <div class="table__spinner"
      style="display:flex;justify-content:center;width:100%;background-color:#fff;text-align:center">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        style="transparent;display:block;" width="200px" height="200px" viewBox="0 0 100 100"
        preserveAspectRatio="xMidYMid">
        <g transform="rotate(0 50 50)">
          <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#353535">
            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.9166666666666666s"
              repeatCount="indefinite"></animate>
          </rect>
        </g>
        <g transform="rotate(30 50 50)">
          <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#353535">
            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.8333333333333334s"
              repeatCount="indefinite"></animate>
          </rect>
        </g>
        <g transform="rotate(60 50 50)">
          <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#353535">
            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.75s"
              repeatCount="indefinite"></animate>
          </rect>
        </g>
        <g transform="rotate(90 50 50)">
          <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#353535">
            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.6666666666666666s"
              repeatCount="indefinite"></animate>
          </rect>
        </g>
        <g transform="rotate(120 50 50)">
          <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#353535">
            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5833333333333334s"
              repeatCount="indefinite"></animate>
          </rect>
        </g>
        <g transform="rotate(150 50 50)">
          <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#353535">
            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5s"
              repeatCount="indefinite"></animate>
          </rect>
        </g>
        <g transform="rotate(180 50 50)">
          <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#353535">
            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.4166666666666667s"
              repeatCount="indefinite"></animate>
          </rect>
        </g>
        <g transform="rotate(210 50 50)">
          <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#353535">
            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.3333333333333333s"
              repeatCount="indefinite"></animate>
          </rect>
        </g>
        <g transform="rotate(240 50 50)">
          <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#353535">
            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.25s"
              repeatCount="indefinite"></animate>
          </rect>
        </g>
        <g transform="rotate(270 50 50)">
          <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#353535">
            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.16666666666666666s"
              repeatCount="indefinite"></animate>
          </rect>
        </g>
        <g transform="rotate(300 50 50)">
          <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#353535">
            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.08333333333333333s"
              repeatCount="indefinite"></animate>
          </rect>
        </g>
        <g transform="rotate(330 50 50)">
          <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#353535">
            <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite">
            </animate>
          </rect>
        </g>
      </svg>
    </div>
  </div>
</div>

<button data-link="Z28tYmV0" class="btn btn_o table__button">
  <span>Veja todas as apostas AO VIVO</span>
</button>
