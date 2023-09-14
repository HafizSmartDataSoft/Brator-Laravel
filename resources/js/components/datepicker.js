import flatpickr from 'flatpickr';

const datepicker = {
  init() {
    const inputDate = document.querySelectorAll('.input-date');
   // const inputDatetime = document.querySelectorAll('.input-datetime');
   // const inputDateRange = document.querySelectorAll('.input-date-range');
   // const inputTime = document.querySelectorAll('.input-time');
   // const inputDateMultiple = document.querySelectorAll('.input-date-multiple');
    //const inputDateFormated = document.querySelectorAll('.input-date-formated');
   // const inputDateInline = document.querySelectorAll('.input-date-inline');
    //const inputDateRangeDisabled = document.querySelectorAll('.input-date-range-disabled');
   // const inputDateCustom = document.querySelectorAll('.input-date-custom');

    if (inputDate.length) {
        [...inputDate].forEach((input) =>
        flatpickr(input, {
         altInput: true,
         altFormat: 'd/m/Y',
        dateFormat: 'Y-m-d',
        })
      );
    }

  },
};

export default datepicker;
