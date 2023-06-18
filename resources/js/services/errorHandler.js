class ErrorHandler {
    errors = {};

    setErrors(errors) {
        if (!!errors && Object.keys(errors).length > 0) {
            Object.keys(errors).forEach(key => {
                this.errors[key] = errors[key][0];
            });
        }
    }

    getError(key) {
        return !!this.errors[key] ? this.errors[key] : null;
    }

    dropError(key) {
        if (!!this.errors[key]) {
            this.errors[key] = '';
        }
    }

    dropAllErrors() {
        this.errors = {}
    }
}

export const errorHandler = new ErrorHandler();
