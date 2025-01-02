const allData = []
const count = [10, 0, 1] // [10 per 1 section, start, +section]

async function onload() {
    await fetch('./data.php').then(res=>res.json()).then(data => {
        allData.push(...data)
    })
    createQues(count[0], count[1], count[2])
}
function createQues(x, y, z) {
    if (count[0] == 40) {return createFinalQues()}
    const element = allData
    const hr = document.createElement('hr')
    const body = document.getElementById('body')
    const btnNext = document.createElement('button')
    const br = document.createElement('br')
    btnNext.type = 'button'
    btnNext.innerHTML = `<i class="fa-sharp fa-solid fa-chevron-down"></i>`
    btnNext.innerHTML += `<i class="fa-sharp fa-solid fa-chevron-down"></i>`
    btnNext.id = 'btnNext'
    btnNext.onclick = next
    // body.append(hr)
    let num = z
    for (let a=y; a < x; a++) {
        const div = document.createElement('div')
        const p = document.createElement('p')
        p.innerHTML = `${element[a].number} ${element[a].content}`
        div.className = 'items-content'
        div.append(p)
        element[a].choice.forEach(element2 => {
            const input = document.createElement('input')
            const label = document.createElement('label')
            const br = document.createElement('br')
            input.type = 'radio'
            input.name = `a${num}`
            input.value = element2
            input.id = `a${num}`
            label.innerHTML = element2
            div.append(input, label, br) 
        });
        num++
        body.append(div)
    }
    body.append(br, btnNext)
}
function createFinalQues() {
    document.getElementById('btnSubmit').style.display = 'block'
    const Anext = document.querySelectorAll('#btnNext')
    if (Anext) {
        Anext.forEach(element => {
            element.style.display = 'none'
        });
    }
}
function next() {
    const Anext = document.querySelectorAll('#btnNext')
    if (Anext) {
        Anext.forEach(element => {
            element.style.display = 'none'
        });
    }
    count[0] += 10
    count[1] += 10
    count[2] += 10
    if (count[0] > 30) {return}
    if (count[0]==20) {
        
        createQues(count[0], count[1], count[2])
    }
    if (count[0]==30) {
        
        createQues(count[0], count[1], count[2])
        createFinalQues()
    }
    document.body.scrollTop += 120
    document.documentElement.scrollTop += 120
}

document.getElementById('body').onsubmit = e => {
    e.target.submit()
    e.target.reset()
    return false
}
function successbar() {
    const bar = document.getElementById('success-bar')
    let val = ((window.innerHeight + document.body.scrollTop) / document.body.scrollHeight) * 100
    bar.style.width = `${val}%` 
}

// function generatePDFd() {
        //     window.jsPDF = window.jspdf.jsPDF;

        //     var doc = new jsPDF();
                
        //     var elementHTML = document.querySelector("#certificate");

        //     doc.html(elementHTML, {
        //         callback: function(doc) {
        //             // Save the PDF
        //             doc.save('sample-document.pdf');
        //         },
        //         x: 15,
        //         y: 15,
        //         width: 170, //target width in the PDF document
        //         windowWidth: 650 //window width in CSS pixels
        //     });
// }

function downFunction() {
    document.body.scrollTop = document.body.scrollHeight; 
    document.documentElement.scrollTop = document.body.scrollHeight; 
}
function topFunction() {
    document.body.scrollTop = 0; 
    document.documentElement.scrollTop = 0; 
}





