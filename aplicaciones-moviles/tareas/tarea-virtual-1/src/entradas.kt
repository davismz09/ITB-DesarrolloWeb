fun main() {
    val precioEntrada = calcularPrecioEntrada(pedirEdad()) ?: run {
        println("EDAD NO VALIDA")
        return
    }
    println("El precio de la entrada es: $$precioEntrada")
}

fun pedirEdad(): Int {
    print("Ingrese su edad: ")
    return readLine()?.toIntOrNull() ?: 0
}

fun calcularPrecioEntrada(edad: Int): Int? {
    return when (edad) {
        in 0 until 12 -> 15
        in 13..60 -> 30
        in 61..Int.MAX_VALUE -> 20
        else -> null // Devuelve null si la edad no es válida
    }
}
