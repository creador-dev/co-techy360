const bfGutenberg = require('../gutenberg');

describe("Test field generator", function () {

    it("Fire element callback", () => {

        const elementMock = jest.fn();

        let field = require('./fixtures/field1');

        bfGutenberg.buildSingleField(elementMock, field);

        expect(elementMock).toHaveBeenCalledTimes(1);

        expect(elementMock).toHaveBeenCalledWith(bfGutenberg.getComponent('TextControl'), field.args);
    });

    it("Should generate fields", () => {


        let fired = 0, logTrace = [];

        const elementMock = jest.fn(function (a, b, c) {

            let log = [a, b];

            if (c) {
                log.push(c);
            }

            logTrace.push(log);

            return ++fired;
        });

        bfGutenberg.buildFields(elementMock, require('./fixtures/field2'));

        expect(elementMock).toHaveBeenCalledTimes(8);

        let trace = require('./fixtures/field2.expect');

        expect(logTrace).toEqual(trace);
    });
});
