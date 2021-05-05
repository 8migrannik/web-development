function isPrimeNumber(n) {
    if (Array.isArray(n) || (Number.isInteger(n))) {
        if (Array.isArray(n)) {
            for ( let k = 0; k <= (n.length - 1); k++) {
                if (Number.isInteger(n[k])) {
                    isNumber = true
                } else {
                    isNumber = false
                    console.log('value should be array of integers or integer')
                    break
                }
            }
            if (isNumber) {
                for (let i = 0; i <= (n.length - 1); i++) {
                    isPrime = true
                    for (let j = 2; j < n[i]; j++) {
                        if (n[i] % j == 0) {
                            isPrime = false
                            break
                        }
                    }
                    if (isPrime && (n[i] != 1)) {
                        console.log(n[i], 'is prime number')
                    } else {
                        console.log(n[i],'is not prime number')
                    }
                }
            }
        } else {
            isPrime = true
            for (let j = 2; j < n; j++) {
                if (n % j == 0) {
                    isPrime = false
                    break
                }
            }
            if (isPrime && (n != 1)) {
                console.log(n, 'is prime number')
            } else {
                console.log(n, 'is not prime number')
            }
        }
    }
    else {
        console.log('value should be array of integers or integer')
    }
}
