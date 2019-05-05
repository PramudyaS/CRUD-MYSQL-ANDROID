package pravin.crudmysql;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import java.util.HashMap;

public class MainActivity extends AppCompatActivity {

     EditText Textname,Textposition,Textsallary;
     Button add,show;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        Textname = (EditText) findViewById(R.id.name);
        Textposition = (EditText) findViewById(R.id.position);
        Textsallary = (EditText) findViewById(R.id.sallary);

        add = (Button) findViewById(R.id.btn_add);
        show = (Button) findViewById(R.id.btn_show);

        add.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                addEmployee();
            }
        });
        show.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getApplicationContext(),showPegawai.class);
                startActivity(intent);
            }
        });

    }

    private void addEmployee(){
        final String name = Textname.getText().toString().trim();
        final String position = Textposition.getText().toString().trim();
        final String sallary = Textsallary.getText().toString().trim();

        class AddEmployee extends AsyncTask<Void,Void,String>{
            ProgressDialog loading;
            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(MainActivity.this,"Menambahkan...","Tunggu...",false,false);
            }
            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                Toast.makeText(MainActivity.this,s,Toast.LENGTH_LONG).show();
            }
            @Override
            protected String doInBackground(Void... v) {
                HashMap<String,String> params = new HashMap<>();
                params.put(konfigurasi.Key_Emp_name,name);
                params.put(konfigurasi.Key_Emp_position,position);
                params.put(konfigurasi.Key_Emp_sallary,sallary);

                RequestHandler rh = new RequestHandler();
                String res = rh.sendPostRequest(konfigurasi.url_Add, params);
                return res;
            }
        }
    }
}
