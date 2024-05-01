package com.example.appsmovilesdse08.imc

import android.content.Intent
import android.os.Bundle
import android.widget.TextView
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.appcompat.widget.AppCompatButton
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
        val resultadoImc: String? = intent.getStringExtra("IMC_RESULTADO")
        tvImc.text = resultadoImc

        btnRecalcular.setOnClickListener {
            val intentImc = Intent(this, ImcActivity::class.java)
            startActivity(intentImc)
        }

    }

    private fun inicializarInterfaz(resultado: Double) {
        when (resultado) {
            in 0.00..18.50 -> { //Está en bajo peso
                tvImc.text
                tvResultado.text
                tvDescripcion.text
            }

            in 18.51..24.99 -> {//Tiene un peso normal
                tvImc.text
                tvResultado.text
                tvDescripcion.text
            }

            in 25.00..29.99 -> {//Tiene sobrepeso
                tvImc.text
                tvResultado.text
                tvDescripcion.text
            }

            in 30.00..99.99 -> {//Tiene obesidad
                tvImc.text
                tvResultado.text
                tvDescripcion.text
            }

            else -> {
                tvImc.text = "error"
                tvResultado.text = "error"
                tvDescripcion.text = "error"
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