package com.njabulo.feedback;

import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.telecom.Connection;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;

import java.sql.DriverManager;


public class MainActivity extends AppCompatActivity {
TextView textView;
    EditText editText;

    private static final String DB_URL="jdbc:mysql://192.168.137.1/feedback";
    private static final String USER="zzz";
    private static final String PASS="123";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        textView = (TextView) findViewById(R.id.textView);
        editText = (EditText) findViewById(R.id.editText);
    }
        public void btnConn(View view)
    {
      Send objSend=new Send();
        objSend.execute("");
    }
private class Send extends AsyncTask<String, String,String>
{
    String msg="";
    String text = editText.getText().toString();

    @Override
    protected void onPreExecute(){textView.setText("Please Wait Inserting Data");}

    @Override
    protected String doInBackground(String... strings)
    {
        try
        {
            Class.forName("com.mysql.jdbc.Driver");
            Connection conn= (Connection) DriverManager.getConnection(DB_URL,USER,PASS);
            if(conn==null)
            {
                msg="Connection goes wrong";
            }
            else {
                String query="INSERT INTO category(description) VALUES('"+text+"')";
             // Statement stmt=conn.createStatement();
               // stmt.executeUpdate(query);
                msg="Inserting Successful!!!";
            }

        }
        catch (Exception e)
        {
            msg="Connection goes wrong";
            e.printStackTrace();
        }
        return msg;
    }
    @Override
    protected void onPostExecute(String msg)
    {
        textView.setText(msg);
    }
}
}


