package com.example.appsmovilesdse08.imc

import android.content.Intent
import android.os.Bundle
import android.widget.TextView
import androidx.appcompat.app.AppCompatActivity
import androidx.appcompat.widget.AppCompatButton
import androidx.core.content.ContextCompat
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.appsmovilesdse08.R

class ResultadoImcActivity : AppCompatActivity() {
    private lateinit var tvResultado: TextView
    private lateinit var tvImc: TextView
    private lateinit var tvDescripcion: TextView
    private lateinit var btnRecalcular: AppCompatButton

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_resultado_imc)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        inicializarComponentes()
        val resultadoImc: Float = intent.getFloatExtra("IMC_RESULTADO", 0.0f)

        inicializarInterfaz(resultadoImc)

        btnRecalcular.setOnClickListener {
            val intentImc = Intent(this, ImcActivity::class.java)
            startActivity(intentImc)
        }

    }

    private fun inicializarInterfaz(resultado: Float) {
        tvImc.text = String.format("%.2f", resultado)
        when (resultado) {
            in 0.00..16.00 -> { //Delgadez severa
                tvResultado.text = getString(R.string.titulo_delgadez_severa)
                tvResultado.setTextColor(ContextCompat.getColor(this, R.color.delgadez_severa))
                tvDescripcion.text = getString(R.string.descripcion_delgadez_severa)
            }

            in 16.01..16.99 -> {//Delgadez moderada
                tvResultado.text = getString(R.string.titulo_delgadez_moderada)
                tvResultado.setTextColor(ContextCompat.getColor(this, R.color.delgadez_moderada))
                tvDescripcion.text = getString(R.string.descripcion_delgadez_moderada)
            }

            in 17.00..18.49 -> {//Delgadez aceptable
                tvResultado.text = getString(R.string.titulo_delgadez_aceptable)
                tvResultado.setTextColor(ContextCompat.getColor(this, R.color.delgadez_aceptable))
                tvDescripcion.text = getString(R.string.descripcion_sobrepeso)
            }

            in 18.5..24.99 -> {//Peso normal
                tvResultado.text = getString(R.string.titulo_peso_normal)
                tvResultado.setTextColor(ContextCompat.getColor(this, R.color.peso_normal))
                tvDescripcion.text = getString(R.string.descripcion_peso_normal)
            }
            in  25.00..29.99 -> {//Sobrepeso
                tvResultado.text = getString(R.string.titulo_sobrepeso)
                tvResultado.setTextColor(ContextCompat.getColor(this, R.color.sobrepeso))
                tvDescripcion.text = getString(R.string.descripcion_sobrepeso)
            }
            in 30.00..34.99 -> {//Obesidad tipo 1
                tvResultado.text = getString(R.string.titulo_obesidad_tipo1)
                tvResultado.setTextColor(ContextCompat.getColor(this, R.color.obesidad_tipo1))
                tvDescripcion.text = getString(R.string.descripcion_obesidad_tipo1)
            }
            in 35.00..40.00 -> {//Obesidad tipo 2
                tvResultado.text = getString(R.string.titulo_obesidad_tipo2)
                tvResultado.setTextColor(ContextCompat.getColor(this, R.color.obesidad_tipo2))
                tvDescripcion.text = getString(R.string.descripcion_obesidad_tipo2)
            }

            in 40.01..49.99 -> {//Obesidad tipo 3 (mórbida)
                tvResultado.text = getString(R.string.titulo_obesidad_tipo3)
                tvResultado.setTextColor(ContextCompat.getColor(this, R.color.obesidad_tipo3))
                tvDescripcion.text = getString(R.string.descripcion_obesidad_tipo3)
            }
            in 50.00..100.00 -> {//Obesidad tipo 4 (extrema)
                tvResultado.text = getString(R.string.titulo_obesidad_tipo4)
                tvResultado.setTextColor(ContextCompat.getColor(this, R.color.obesidad_tipo4))
                tvDescripcion.text = getString(R.string.descripcion_obesidad_tipo4)
            }

            else -> {
                tvResultado.text = getString(R.string.titulo_error)
                tvResultado.setTextColor(ContextCompat.getColor(this, R.color.error))
                tvDescripcion.text = getString(R.string.descripcion_error)
            }
        }
    }

    private fun inicializarComponentes() {
        tvImc = findViewById(R.id.tvImc)
        tvResultado = findViewById(R.id.tvResultado)
        tvDescripcion = findViewById(R.id.tvDescripcion)
        btnRecalcular = findViewById(R.id.btnRecalcular)
    }
}