<script>
fetch('https://myscoreapi.herokuapp.com/betandyou')
  .then(data => data.json())
  .then(data => createRowLine(data.results))

const createRowLine = (arr) => {
  let content = ''
  arr.map((row, i) => {
    if (i < 25 || i >= 30) return

    content += `
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
  </div>
</div>

<button data-link="Z28tYmV0" class="btn btn_o table__button">
  <span>Veja todas as apostas AO VIVO</span>
</button>
    `
  })

  document.querySelector('.table__spinner').remove()
  document.querySelector('.table__body.line').insertAdjacentHTML('afterbegin', content);
}
</script>
